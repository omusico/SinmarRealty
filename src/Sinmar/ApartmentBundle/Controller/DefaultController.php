<?php

namespace Sinmar\ApartmentBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sinmar\ApartmentBundle\Entity\Message;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="home")
     * @Template("SinmarApartmentBundle:Default:home.html.twig")
     */
    public function homeAction()
    {
        $messages = $this->getDoctrine()->getRepository("SinmarApartmentBundle:Message")->findBy(array(), array("createdAt" => "ASC"));

        return array("messages" => $messages);
    }

    /**
     * @Route("/messages", name="message_list")
     * @Template("SinmarApartmentBundle:Message:list.html.twig")
     */
    public function messageListAction(Request $request)
    {
        $em    = $this->get('doctrine.orm.entity_manager');
        $dql   = "SELECT m FROM SinmarApartmentBundle:Message m";
        $query = $em->createQuery($dql);

        $paginator  = $this->get('knp_paginator');

        $pagination = $paginator->paginate(
            $query,
            $request->query->getInt('page', 1)/*page number*/,
            25/*limit per page*/
        );

        return array("pagination" => $pagination);
    }

    /**
     * @Route("/messages/add", name="message_add")
     * @Route("/messages/edit/{id}", name="message_edit")
     * @Template("SinmarApartmentBundle:Message:form.html.twig")
     */
    public function messageHandlerAction($id = 0)
    {
        if (is_numeric($id) && $id > 0)
        {
            $message = $this->getDoctrine()->getRepository("SinmarApartmentBundle:Message")->find($id);
        } else {
            $message = new Message();
        }

        return array("message" => $message);
    }

    /**
     * @Route("/message/handle", name="message_handle")
     * @Method({"POST"})
     */
    public function messagePostAction(Request $request)
    {
        $req = $request->request;

        if (is_numeric($req->get("id")) && $req->get("id") > 0)
        {
            $id = $req->get("id");
            $message = $this->getDoctrine()->getRepository("SinmarApartmentBundle:Message")->find($id);
        } else {
            $message = new Message();
        }

        $user = $this->getDoctrine()->getRepository("SinmarApartmentBundle:User")->find($this->getUser()->getId());

        $message->setTitle($req->get("title"));
        $message->setMessage($req->get("message"));

        $message->setEditedBy($user);
        if ($message->getPostedBy() == null) {
            $message->setPostedBy($user);
        }

        $em = $this->getDoctrine()->getEntityManager();

        if ($message->getId() == null) {
            $em->persist($message);
            $this->get('session')->getFlashBag()->add('success', "Message Added");
        } else {
            $this->get('session')->getFlashBag()->add('success', "Message Updated");
        }

        $em->flush();

        return $this->redirectToRoute('message_list');
    }
}
