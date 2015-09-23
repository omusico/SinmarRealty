<?php

namespace Sinmar\ApartmentBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Community
 *
 * @ORM\Table(name="Community")
 * @ORM\Entity
 */
class Community
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="Apartment", mappedBy="community")
     */
    private $apartments;


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
     * Set name
     *
     * @param string $name
     *
     * @return Community
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set apartments
     *
     * @param string $apartments
     *
     * @return Community
     */
    public function setApartments($apartments)
    {
        $this->apartments = $apartments;

        return $this;
    }

    /**
     * Get apartments
     *
     * @return string
     */
    public function getApartments()
    {
        return $this->apartments;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->apartments = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add apartment
     *
     * @param \Sinmar\ApartmentBundle\Entity\Apartment $apartment
     *
     * @return Community
     */
    public function addApartment(\Sinmar\ApartmentBundle\Entity\Apartment $apartment)
    {
        $this->apartments[] = $apartment;

        return $this;
    }

    /**
     * Remove apartment
     *
     * @param \Sinmar\ApartmentBundle\Entity\Apartment $apartment
     */
    public function removeApartment(\Sinmar\ApartmentBundle\Entity\Apartment $apartment)
    {
        $this->apartments->removeElement($apartment);
    }
}
