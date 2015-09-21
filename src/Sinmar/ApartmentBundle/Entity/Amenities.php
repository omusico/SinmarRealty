<?php

namespace Sinmar\ApartmentBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Amenities
 *
 * @ORM\Table(name="Amenities")
 * @ORM\Entity
 */
class Amenities
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="Apartment", mappedBy="amenities")
     */
    private $apartment;

    /**
     * @var integer
     *
     * @ORM\Column(name="washerDryer", type="integer")
     */
    private $washerDryer;

    /**
     * @var integer
     *
     * @ORM\Column(name="garage", type="integer")
     */
    private $garage;

    /**
     * @var integer
     *
     * @ORM\Column(name="fitnessCenter", type="integer")
     */
    private $fitnessCenter;

    /**
     * @var integer
     *
     * @ORM\Column(name="patioBalcony", type="integer")
     */
    private $patioBalcony;

    /**
     * @var integer
     *
     * @ORM\Column(name="handicapAccess", type="integer")
     */
    private $handicapAccess;

    /**
     * @var integer
     *
     * @ORM\Column(name="graniteCountertop", type="integer")
     */
    private $graniteCountertop;

    /**
     * @var integer
     *
     * @ORM\Column(name="tennisCourt", type="integer")
     */
    private $tennisCourt;

    /**
     * @var integer
     *
     * @ORM\Column(name="sandVolleyball", type="integer")
     */
    private $sandVolleyball;

    /**
     * @var integer
     *
     * @ORM\Column(name="racquetball", type="integer")
     */
    private $racquetball;

    /**
     * @var integer
     *
     * @ORM\Column(name="theater", type="integer")
     */
    private $theater;

    /**
     * @var integer
     *
     * @ORM\Column(name="businessCenter", type="integer")
     */
    private $businessCenter;

    /**
     * @var integer
     *
     * @ORM\Column(name="fireplace", type="integer")
     */
    private $fireplace;

    /**
     * @var integer
     *
     * @ORM\Column(name="pool", type="integer")
     */
    private $pool;

    /**
     * @var integer
     *
     * @ORM\Column(name="gatedCommunity", type="integer")
     */
    private $gatedCommunity;

    /**
     * @var integer
     *
     * @ORM\Column(name="noCarpet", type="integer")
     */
    private $noCarpet;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set washerDryer
     *
     * @param integer $washerDryer
     *
     * @return Amenities
     */
    public function setWasherDryer($washerDryer)
    {
        $this->washerDryer = $washerDryer;

        return $this;
    }

    /**
     * Get washerDryer
     *
     * @return integer
     */
    public function getWasherDryer()
    {
        return $this->washerDryer;
    }

    /**
     * Set garage
     *
     * @param integer $garage
     *
     * @return Amenities
     */
    public function setGarage($garage)
    {
        $this->garage = $garage;

        return $this;
    }

    /**
     * Get garage
     *
     * @return integer
     */
    public function getGarage()
    {
        return $this->garage;
    }

    /**
     * Set fitnessCenter
     *
     * @param integer $fitnessCenter
     *
     * @return Amenities
     */
    public function setFitnessCenter($fitnessCenter)
    {
        $this->fitnessCenter = $fitnessCenter;

        return $this;
    }

    /**
     * Get fitnessCenter
     *
     * @return integer
     */
    public function getFitnessCenter()
    {
        return $this->fitnessCenter;
    }

    /**
     * Set patioBalcony
     *
     * @param integer $patioBalcony
     *
     * @return Amenities
     */
    public function setPatioBalcony($patioBalcony)
    {
        $this->patioBalcony = $patioBalcony;

        return $this;
    }

    /**
     * Get patioBalcony
     *
     * @return integer
     */
    public function getPatioBalcony()
    {
        return $this->patioBalcony;
    }

    /**
     * Set handicapAccess
     *
     * @param integer $handicapAccess
     *
     * @return Amenities
     */
    public function setHandicapAccess($handicapAccess)
    {
        $this->handicapAccess = $handicapAccess;

        return $this;
    }

    /**
     * Get handicapAccess
     *
     * @return integer
     */
    public function getHandicapAccess()
    {
        return $this->handicapAccess;
    }

    /**
     * Set graniteCountertop
     *
     * @param integer $graniteCountertop
     *
     * @return Amenities
     */
    public function setGraniteCountertop($graniteCountertop)
    {
        $this->graniteCountertop = $graniteCountertop;

        return $this;
    }

    /**
     * Get graniteCountertop
     *
     * @return integer
     */
    public function getGraniteCountertop()
    {
        return $this->graniteCountertop;
    }

    /**
     * Set tennisCourt
     *
     * @param integer $tennisCourt
     *
     * @return Amenities
     */
    public function setTennisCourt($tennisCourt)
    {
        $this->tennisCourt = $tennisCourt;

        return $this;
    }

    /**
     * Get tennisCourt
     *
     * @return integer
     */
    public function getTennisCourt()
    {
        return $this->tennisCourt;
    }

    /**
     * Set sandVolleyball
     *
     * @param integer $sandVolleyball
     *
     * @return Amenities
     */
    public function setSandVolleyball($sandVolleyball)
    {
        $this->sandVolleyball = $sandVolleyball;

        return $this;
    }

    /**
     * Get sandVolleyball
     *
     * @return integer
     */
    public function getSandVolleyball()
    {
        return $this->sandVolleyball;
    }

    /**
     * Set racquetball
     *
     * @param integer $racquetball
     *
     * @return Amenities
     */
    public function setRacquetball($racquetball)
    {
        $this->racquetball = $racquetball;

        return $this;
    }

    /**
     * Get racquetball
     *
     * @return integer
     */
    public function getRacquetball()
    {
        return $this->racquetball;
    }

    /**
     * Set theater
     *
     * @param integer $theater
     *
     * @return Amenities
     */
    public function setTheater($theater)
    {
        $this->theater = $theater;

        return $this;
    }

    /**
     * Get theater
     *
     * @return integer
     */
    public function getTheater()
    {
        return $this->theater;
    }

    /**
     * Set businessCenter
     *
     * @param integer $businessCenter
     *
     * @return Amenities
     */
    public function setBusinessCenter($businessCenter)
    {
        $this->businessCenter = $businessCenter;

        return $this;
    }

    /**
     * Get businessCenter
     *
     * @return integer
     */
    public function getBusinessCenter()
    {
        return $this->businessCenter;
    }

    /**
     * Set fireplace
     *
     * @param integer $fireplace
     *
     * @return Amenities
     */
    public function setFireplace($fireplace)
    {
        $this->fireplace = $fireplace;

        return $this;
    }

    /**
     * Get fireplace
     *
     * @return integer
     */
    public function getFireplace()
    {
        return $this->fireplace;
    }

    /**
     * Set pool
     *
     * @param integer $pool
     *
     * @return Amenities
     */
    public function setPool($pool)
    {
        $this->pool = $pool;

        return $this;
    }

    /**
     * Get pool
     *
     * @return integer
     */
    public function getPool()
    {
        return $this->pool;
    }

    /**
     * Set gatedCommunity
     *
     * @param integer $gatedCommunity
     *
     * @return Amenities
     */
    public function setGatedCommunity($gatedCommunity)
    {
        $this->gatedCommunity = $gatedCommunity;

        return $this;
    }

    /**
     * Get gatedCommunity
     *
     * @return integer
     */
    public function getGatedCommunity()
    {
        return $this->gatedCommunity;
    }

    /**
     * Set noCarpet
     *
     * @param integer $noCarpet
     *
     * @return Amenities
     */
    public function setNoCarpet($noCarpet)
    {
        $this->noCarpet = $noCarpet;

        return $this;
    }

    /**
     * Get noCarpet
     *
     * @return integer
     */
    public function getNoCarpet()
    {
        return $this->noCarpet;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->apartment = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add apartment
     *
     * @param \Sinmar\ApartmentBundle\Entity\Apartment $apartment
     *
     * @return Amenities
     */
    public function addApartment(\Sinmar\ApartmentBundle\Entity\Apartment $apartment)
    {
        $this->apartment[] = $apartment;

        return $this;
    }

    /**
     * Remove apartment
     *
     * @param \Sinmar\ApartmentBundle\Entity\Apartment $apartment
     */
    public function removeApartment(\Sinmar\ApartmentBundle\Entity\Apartment $apartment)
    {
        $this->apartment->removeElement($apartment);
    }

    /**
     * Get apartment
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getApartment()
    {
        return $this->apartment;
    }
}
