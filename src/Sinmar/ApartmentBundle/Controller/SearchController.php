<?php

namespace Sinmar\ApartmentBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class SearchController extends Controller
{
    /**
     * @Route("/search", name="search")
     * @Template("SinmarApartmentBundle:Default:search.html.twig")
     */
    public function homeAction()
    {
        if ($_POST)
        {
            $results = $this->getResults($_POST);
        } else {
            $results = array("status" => 0);
        }

        return array();
    }

    private function getResults($search)
    {








        $results = "";

        return array("status" => 1, "search" => $results);
    }

    /**
     * @Route("/search/getByName/{name}", name="searchByName")
     * @Template("SinmarApartmentBundle:Search:search.html.twig")
     */
    public function getByName($name)
    {
        $results = $this->getDoctrine()->getManager()->getRepository("SinmarApartmentBundle:Apartment")->findByName($name);

        var_dump($results);
        return array("results" => $results);
    }
}
