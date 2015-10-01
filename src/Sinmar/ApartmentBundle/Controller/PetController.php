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


class PetController extends Controller
{
    /**
     * @Route("/pets", name="pet_home")
     * @Template("SinmarApartmentBundle:Pet:list.html.twig")
     */
    public function petListAction()
    {

        return array();
    }

}