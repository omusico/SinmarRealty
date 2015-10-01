<?php

namespace Sinmar\ApartmentBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Sinmar\ApartmentBundle\Entity\Community;
use Sinmar\ApartmentBundle\Entity\Apartment;


class ApartmentController extends Controller
{
    /**
     * @Route("/apartments", name="apartments_list")
     * @Template("SinmarApartmentBundle:Apartment:list.html.twig")
     */
    public function apartmentList(Request $request)
    {
        $em    = $this->get('doctrine.orm.entity_manager');
        $dql   = "SELECT a FROM SinmarApartmentBundle:Apartment a";
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
     * @Route("/apartments/add", name="apartment_add")
     * @Route("/apartments/edit/{id}", name="apartment_edit")
     * @Template("SinmarApartmentBundle:Apartment:form.html.twig")
     */
    public function apartmentHandlerAction($id = 0)
    {
        if (is_numeric($id) && $id > 0) {
            $apartment = $this->getDoctrine()->getRepository("SinmarApartmentBundle:Apartment")->find($id);

        } else {
            $apartment = new Apartment();
        }

        $communities = $this->getDoctrine()->getRepository("SinmarApartmentBundle:Community")->findAll();


        return array("apartment" => $apartment, "communities" => $communities);
    }

    /**
     * @Route("/communities", name="list_communities")
     * @Template("SinmarApartmentBundle:Community:list.html.twig")
     */
    public function communityList(Request $request)
    {
        $em    = $this->get('doctrine.orm.entity_manager');
        $dql   = "SELECT a FROM SinmarApartmentBundle:Community a";
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
     * @Route("/communities/add", defaults={"id" = 0}, name="add_community")
     * @Route("/communities/edit/{id}", name="edit_community")
     * @Template("SinmarApartmentBundle:Community:form.html.twig")
     */
    public function communityEdit($id)
    {
        if ($id > 0) {
            $community = $this->getDoctrine()->getRepository("SinmarApartmentBundle:Community")->find($id);
        } else {
            $community = new Community();
        }
        return array("community" => $community);
    }

    /**
     * @Route("/communities/update", name="update_community")
     */
    public function communityHandler(Request $request)
    {
        if (is_numeric($request->request->get("id")) && $request->request->get("id") > 0) {
            //update
            $community = $this->getDoctrine()->getRepository("SinmarApartmentBundle:Community")->find($request->request->get("id"));
        } else {
            //new
            $community = new Community();
        }

        $community->setName($request->request->get("name"));

        $em = $this->getDoctrine()->getManager();

        if ($request->request->get("id") == null)
        {
            $em->persist($community);
            $this->get('session')->getFlashBag()->add('notice', "Community Added");
        } else {
            $this->get('session')->getFlashBag()->add('notice', "Community Updated");
        }

        $em->flush();

        return $this->redirectToRoute("list_communities");
    }

}