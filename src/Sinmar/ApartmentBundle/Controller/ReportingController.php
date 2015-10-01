<?php

namespace Sinmar\ApartmentBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sinmar\ApartmentBundle\Entity\Message;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class ReportingController extends Controller
{
    /**
     * @Route("/reporting", name="report_home")
     * @Template("SinmarApartmentBundle:Reporting:index.html.twig")
     */
    public function reportingAction()
    {

        return array();
    }

}