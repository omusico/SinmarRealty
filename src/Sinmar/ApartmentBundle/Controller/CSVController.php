<?php

namespace Sinmar\ApartmentBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;
use Sinmar\ApartmentBundle\Entity\Apartment;
use Sinmar\ApartmentBundle\Entity\Amenities;
use Sinmar\ApartmentBundle\Entity\Community;

class CSVController extends Controller
{
//    /**
//     * @Route("/get_csv")
//     * @Template()
//     */
//    public function indexAction()
//    {
//        $csv = array_map('str_getcsv', file('apartments.csv'));
//
//        $apts = $this->returnReadableArray($csv);
//
//        $em = $this->getDoctrine()->getManager();
//
//        $apartmentArray = array();
//
//        $i = 0;
//
//        foreach($apts as $a)
//        {
//            if (!is_numeric($a['community']))
//                continue;
//
//            $apt = new Apartment();
//
//            //get address components using google api
//            $address = $this->getAddress($a['address']);
//
//            //get amenities object
//            $amenities = $this->setAmenities($a['washer']);
//
//            //get clean string of numbers
//            $phone = $this->cleanContactNumber($a['phone']);
//            $fax = $this->cleanContactNumber($a['fax']);
//
//            //determine if theres a rent to income ratio, return 0 (no) or 1 (yes)
//            $ratio = $this->incomeToRentRatio($a['rent-ratio']);
//
//            $pets = $this->petsAllowed($a['pets']);
//            $felony = $this->felonyAllowed($a['felony']);
//            $misdemeanor = $this->misdemeanorAllowed($a['misdemeanor']);
//            $judgements = $this->judgementsAllowed($a['judgements']);
//
//            //get community object
//            $community = $this->getDoctrine()->getRepository("SinmarApartmentBundle:Community")->find($a['community']);
//            $apt->setCommunity($community);
//
//            //set name
//            $apt->setName($a['name']);
//
//            //address components
//            $apt->setAddress($address['address']);
//            $apt->setCity($address['city']);
//            $apt->setState($address['state']);
//            $apt->setZip($address['zip']);
//
//            //lat and longitude
//            $apt->setLat($address['lat']);
//            $apt->setLng($address['lng']);
//
//            $apt->setPhone($phone);
//            $apt->setFax($fax);
//            $apt->setEmail("");
//            $apt->setWebsite("");
//            $apt->setDescription("");
//
//            $apt->setMoveInSpecials("");
//            $apt->setApartmentContactName("");
//            $apt->setApartmentContactPhone("");
//            $apt->setComplianceDepotMember(3);
//            $apt->setRentalAgents(3);
//            $apt->setIncomeToRentRatio($ratio);
//            $apt->setAmenities($amenities);
//            $apt->setMgmt($a['management']);
//
//            $apt->setPets($pets);
//            $apt->setFelony($felony['accepted']);
//            $apt->setYearsAfterFelony($felony['yearsAfter']);
//
//            $apt->setMisdemeanor($misdemeanor['accepted']);
//            $apt->setYearsAfterMisdemeanor($misdemeanor['yearsAfter']);
//
//            $apt->setJudgements($judgements['accepted']);
//            $apt->setJudgementAge($judgements['age']);
//            $apt->setJudgementAmtAccepted($judgements['amt']);
//
//            $em->persist($apt);
//            $em->persist($amenities);
//
//            $apartmentArray[] = $apt;
//            $i = $i + 1;
//        }
//
//        $em->flush();
//
//        return new Response("Die");
//    }
//
//    private function returnReadableArray($csv)
//    {
//        $apts = array();
//
//        foreach ($csv as $c)
//        {
//            $apt = array(
//                "community" => $c[0],
//                "name" => $c[1],
//                "address" => $c[2],
//                "phone" => $c[3],
//                "fax" => $c[4],
//                "bedrooms" => $c[5],
//                "felony" => $c[6],
//                "misdemeanor" => $c[7],
//                "judgements" => $c[8],
//                "washer" => $c[9],
//                "pets" => $c[10],
//                "utilities" => $c[11],
//                "rent-ratio" => $c[12],
//                "section8" => $c[13],
//                "management" => $c[14]
//            );
//
//            $apts[] = $apt;
//        }
//
//        return $apts;
//    }
//
//    private function getAddress($address)
//    {
//        $geocodeKey = "&key=AIzaSyBQGSHBTA-RjYphVfWVQcFQfVhw8N-swrU";
//        $geocodeUrl = 'https://maps.googleapis.com/maps/api/geocode/json?address=';
//
//        if ($address != "") {
//            $address = urlencode($address);
//
//            $geocodedAddress = file_get_contents($geocodeUrl . $address . $geocodeKey);
//
//            $gc = json_decode($geocodedAddress, true);
//
//            if ($gc['status'] == "OK") {
//                $adc = $gc['results'][0]['address_components'];
//                var_dump($adc);
//                echo "<br />";
//
//                //components
//                $apt['address'] = $adc[0]['short_name'] . " " . $adc[1]['short_name'];
//                $apt['city'] = $adc[3]['short_name'];
//                $apt['state'] = $adc[4]['short_name'];
//                if (array_key_exists(6, $adc)) {
//                    $apt['zip'] = $adc[6]['short_name'];
//                } else {
//                    $apt['zip'] = $adc[0]['short_name'];
//                }
//                $apt['lat'] = $gc['results'][0]['geometry']['location']['lat'];
//                $apt['lng'] = $gc['results'][0]['geometry']['location']['lng'];
//
//            } else {
//                $apt['address'] = $address;
//                $apt['city'] = "";
//                $apt['state'] = "";
//                $apt['zip'] = "";
//                $apt['lat'] = "";
//                $apt['lng'] = "";
//            }
//        } else {
//            $apt['address'] = "";
//            $apt['city'] = "";
//            $apt['state'] = "";
//            $apt['zip'] = "";
//            $apt['lat'] = "";
//            $apt['lng'] = "";
//        }
//
//        return $apt;
//    }
//
//    private function felonyAllowed($felony)
//    {
//        $felony = strtolower($felony);
//        $num = preg_replace("/[^0-9]/","",$felony);
//
//        if (is_numeric($num) && $num != "")
//        {
//            $felony = 1;
//            $yearsAfter = $num;
//        } elseif ($felony == "yes" || $felony == "y")
//        {
//            $felony = 1;
//            $yearsAfter = 0;
//        } elseif ($felony == "no" || $felony == "n")
//        {
//            $felony = 0;
//            $yearsAfter = 0;
//        } else {
//            $felony = 2;
//            $yearsAfter = 0;
//        }
//
//        return array("accepted" => $felony, "yearsAfter" => $yearsAfter);
//    }
//
//    private function misdemeanorAllowed($misdemeanor)
//    {
//        $misdemeanor = strtolower($misdemeanor);
//        $num = preg_replace("/[^0-9]/","",$misdemeanor);
//
//        $yearsAfter = 0;
//
//        if (is_numeric($num) && $num != "")
//        {
//            $accepted = 1;
//            $yearsAfter = $num;
//        }
//        elseif ($misdemeanor == "yes" || $misdemeanor == "y" || $misdemeanor == "accepted")
//        {
//            $accepted = 1;
//        }
//        elseif ($misdemeanor == "no" || $misdemeanor == "n") {
//            $accepted = 0;
//        }
//        elseif ($misdemeanor == "some")
//        {
//            $accepted = 2;
//        }
//        elseif ($misdemeanor == "approval")
//        {
//            $accepted = 5;
//        }
//        elseif ($misdemeanor == "locators")
//        {
//          $accepted = 4;
//        } else {
//            $accepted = 3;
//        }
//
//        return array("accepted" => $accepted, "yearsAfter" => $yearsAfter);
//    }
//
//    private function judgementsAllowed($judge)
//    {
//        $jd = strtolower($judge);
//        $num = preg_replace("/[^0-9]/","",$judge);
//
//        $age = 0;
//
//        if (is_numeric($num) && $num != "")
//        {
//            $accepted = 1;
//            $age = $num;
//        } elseif ($jd == "yes" || $jd == "y")
//        {
//            $accepted = 1;
//        } elseif ($jd == "no" || $jd == "n")
//        {
//            $accepted = 0;
//        } elseif ($jd == "paid off")
//        {
//            $accepted = 4;
//        } elseif ($jd == "some") {
//            $accepted = 2;
//        } else {
//            $accepted = 3;
//        }
//
//        return array("accepted" => $accepted, "age" => $age, "amt" => 0);
//    }
//
//    private function petsAllowed($pets)
//    {
//        $pets = strtolower($pets);
//
//        if ($pets == "yes" || $pets == "y")
//        {
//            $pets = 1;
//        } elseif ($pets == "no" || $pets == "n")
//        {
//            $pets = 0;
//        } elseif ($pets != "") {
//            $pets = 2;
//        } else {
//            $pets = 3;
//        }
//
//        return $pets;
//    }
//
//    private function incomeToRentRatio($ratio)
//    {
//        $ratio = strtolower($ratio);
//
//        if ($ratio == "yes" || $ratio == "y")
//        {
//            $ratio = 1;
//        } elseif ($ratio == "no" || $ratio == "n")
//        {
//            $ratio = 0;
//        } else {
//            $ratio = 3;
//        }
//
//        return $ratio;
//    }
//
//    private function cleanContactNumber($number)
//    {
//        $n = str_replace(' ', '-', $number);
//        $cleanNumber = preg_replace('/[^A-Za-z0-9\-]/', '', $n);
//
//        return $cleanNumber;
//    }
//
//    private function setAmenities($washer)
//    {
//        $amenities = new Amenities();
//        //0 == no
//        //1 == yes
//        //2 == some
//        //3 == unknown
//
//        $washer = strtolower($washer);
//
//        if ($washer == "yes" || $washer == "y") {
//            $washer = 1;
//        } elseif ($washer == "some" || $washer == "s") {
//            $washer = 2;
//        } elseif($washer == "") {
//          $washer = 3;
//        } else {
//            $washer = 0;
//        }
//
//        $amenities->setWasherDryer($washer);
//        $amenities->setGarage(3);
//        $amenities->setFitnessCenter(3);
//        $amenities->setPatioBalcony(3);
//        $amenities->setHandicapAccess(3);
//        $amenities->setGraniteCountertop(3);
//        $amenities->setTennisCourt(3);
//        $amenities->setSandVolleyball(3);
//        $amenities->setRacquetball(3);
//        $amenities->setTheater(3);
//        $amenities->setBusinessCenter(3);
//        $amenities->setFireplace(3);
//        $amenities->setPool(3);
//        $amenities->setGatedCommunity(3);
//        $amenities->setNoCarpet(3);
//
////        $this->getDoctrine()->getManager()->persist($amenities);
//
//        return $amenities;
//    }
}
