<?php

namespace Sinmar\ApartmentBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     * @Template("SinmarApartmentBundle:Default:home.html.twig")
     */
    public function homeAction()
    {
        $apartment = array();

        for($i = 1; $i < 10; $i++)
        {
            $apartment[$i] = $this->getDoctrine()->getManager()->getRepository("SinmarApartmentBundle:Apartment")->find($i);
        }

        return array("apartment" => $apartment);
    }
}
