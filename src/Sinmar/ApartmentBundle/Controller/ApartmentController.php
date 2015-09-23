<?php

namespace Sinmar\ApartmentBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;


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

//    /**
//     * @Route("/apartments/edit/{id}", name="apartment_edit")
//     * @Template("SinmarApartmentBundle:Apartment:form.html.twig")
//     */
//    public function apartmentEdit($id = 0)
//    {
//        if (is_numeric($id) && $id > 0) {
//            $apartment = $this->getDoctrine()->getRepository("SinmarApartmentBundle:Apartment")->find($id);
//
//            $communities = $this->getDoctrine()->getRepository("SinmarApartmentBundle:Community")->findAll();
//
//        } else {
//            $this->get('session')->getFlashBag()->add('error', "Can't find specified Apartment.");
//        }
//
//        return array("apartment" => $apartment, "communities" => $communities);
//    }


}