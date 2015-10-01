<?php

namespace Sinmar\ApartmentBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Sinmar\ApartmentBundle\Entity\Apartment;
use Sinmar\ApartmentBundle\Entity\Community;

class SearchController extends Controller
{
    /**
     * @Route("/search", name="search")
     * @Template("SinmarApartmentBundle:Search:search.html.twig")
     */
    public function searchAction()
    {
        $complexes = $this->getDoctrine()->getRepository("SinmarApartmentBundle:Apartment")->findAll();
        $communities = $this->getDoctrine()->getRepository("SinmarApartmentBundle:Community")->findAll();
        $states = $this->states();
        $mgmt = $this->getDoctrine()->getManager()->createQuery("SELECT DISTINCT a.mgmt FROM SinmarApartmentBundle:Apartment a")->getResult();

        return array("complexes" => $complexes, "communities" => $communities, "states" => $states, "mgmt" => $mgmt);
    }

    /**
     * @Route("/search/results", name="searchResults")
     * @Template("SinmarApartmentBundle:Search:results.html.twig")
     */
    public function searchResults(Request $request)
    {
        $req = $request->query;
        $em = $this->getDoctrine()->getManager();

        if ($req->get('complex'))
        {
            $complex = $this->getDoctrine()->getRepository("SinmarApartmentBundle:Apartment")->find($req->get("complex"));

            $results = array(
                "success" => true,
                "name" => $complex->getName(),
                "community" => $complex->getCommunity()->getName(),
                "address" => $complex->getAddress()
            );

            return new JsonResponse($results);
        } else {
//            $query = "SELECT a, b FROM SinmarApartmentBundle:Apartment a
//                      LEFT JOIN SinmarApartmentBundle:Amenities b
//                      ON a.amenities = b.id
//                      WHERE a.id > 0 ";

            $repository = $this->getDoctrine()
                ->getRepository('SinmarApartmentBundle:Apartment');

            $query = $repository->createQueryBuilder('a')
                ->leftJoin('a.amenities', 'b');

            $params = array();

            if ($req->get("community"))
            {
                $query->AndWhere("a.community = :community");
                $query->SetParameter("community", $req->get("community"));
            }

            if ($req->get("address"))
            {
                $query->AndWhere("a.address LIKE :address");
                $query->SetParameter("address", '%'.$req->get("address").'%');
            }

            if ($req->get("city"))
            {
                $query->AndWhere("a.city LIKE :city");
                $query->SetParameter("city", '%'.$req->get("city").'%');
            }

            if ($req->get("zip"))
            {
                $query->AndWhere("a.zip = :zip");
                $query->SetParameter("zip", $req->get("zip"));
            }

            if ($req->get("mgmt"))
            {
                $query->AndWhere("a.mgmt = :mgmt");
                $query->SetParameter("mgmt", $req->get("mgmt"));
            }

            if ($req->get("workWithAgents"))
            {
                $query->AndWhere("a.rentalAgents = :agents");
                $query->SetParameter("agents", $req->get("workWithAgents"));
            }

            if ($req->get("incomeRentRatio"))
            {
                $query->AndWhere("a.incomeToRentRatio = :ratio");
                $query->SetParameter("ratio", $req->get("incomeRentRatio"));
            }

            if ($req->get("gatedCommunity"))
            {
                $query->AndWhere("b.gatedCommunity = :gated");
                $query->SetParameter("gated", $req->get("gatedCommunity"));
            }

            if ($req->get("washerDryer"))
            {
                $query->AndWhere("b.washerDryer = :washer");
                $query->SetParameter("washer", $req->get("washerDryer"));
            }

            if ($req->get("pool"))
            {
                $query->AndWhere("b.pool = :pool");
                $query->SetParameter("pool", $req->get("pool"));
            }

            if ($req->get("garage"))
            {
                $query->AndWhere("b.garage = :garage");
                $query->SetParameter("garage", $req->get("garage"));
            }

            if ($req->get("fitnessCenter"))
            {
                $query->AndWhere("b.fitnessCenter = :fitness");
                $query->SetParameter("fitness", $req->get("fitnessCenter"));
            }

            if ($req->get("patioBalcony"))
            {
                $query->AndWhere("b.patioBalcony = :patio");
                $query->SetParameter("patio", $req->get("patioBalcony"));
            }

            $runQuery = $query->getQuery()->getResult();

            $results = array();
            foreach($runQuery as $r)
            {
                $result = array(
                    "id" => $r->getID(),
                    "name" => $r->getName(),
                    "address" => $r->getAddress(),
                    "city" => $r->getCity(),
                    "zip" => $r->getZip(),
                    "community" => $r->getCommunity()->getName(),
                    "mgmt" => $r->getMgmt(),
                    "agents" => $r->getRentalAgents(),
                    "incomeRatio" => $r->getIncomeToRentRatio(),
                    "washerDryer" => $r->getAmenities()->getWasherDryer()
                );

                $results[] = $result;
            }

            return new JsonResponse($results);
        }
    }

    private function states()
    {
        return array(
            'AL' => 'Alabama',
            'AK' => 'Alaska',
            'AZ' => 'Arizona',
            'AR' => 'Arkansas',
            'CA' => 'California',
            'CO' => 'Colorado',
            'CT' => 'Connecticut',
            'DE' => 'Delaware',
            'FL' => 'Florida',
            'GA' => 'Georgia',
            'HI' => 'Hawaii',
            'ID' => 'Idaho',
            'IL' => 'Illinois',
            'IN' => 'Indiana',
            'IA' => 'Iowa',
            'KS' => 'Kansas',
            'KY' => 'Kentucky',
            'LA' => 'Louisiana',
            'ME' => 'Maine',
            'MD' => 'Maryland',
            'MA' => 'Massachusetts',
            'MI' => 'Michigan',
            'MN' => 'Minnesota',
            'MS' => 'Mississippi',
            'MO' => 'Missouri',
            'MT' => 'Montana',
            'NE' => 'Nebraska',
            'NV' => 'Nevada',
            'NH' => 'New Hampshire',
            'NJ' => 'New Jersey',
            'NM' => 'New Mexico',
            'NY' => 'New York',
            'NC' => 'North Carolina',
            'ND' => 'North Dakota',
            'OH' => 'Ohio',
            'OK' => 'Oklahoma',
            'OR' => 'Oregon',
            'PA' => 'Pennsylvania',
            'RI' => 'Rhode Island',
            'SC' => 'South Carolina',
            'SD' => 'South Dakota',
            'TN' => 'Tennessee',
            'TX' => 'Texas',
            'UT' => 'Utah',
            'VT' => 'Vermont',
            'VA' => 'Virginia',
            'WA' => 'Washington',
            'DC' => 'Washington, DC',
            'WV' => 'West Virginia',
            'WI' => 'Wisconsin',
            'WY' => 'Wyoming'
        );
    }
}
