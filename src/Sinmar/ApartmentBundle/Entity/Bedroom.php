<?php

namespace Sinmar\ApartmentBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Bedroom
 *
 * @ORM\Table(name="Bedroom")
 * @ORM\Entity
 */
class Bedroom
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
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    /**
     * @ORM\ManyToOne(targetEntity="Apartment", inversedBy="beds")
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
     * Set type
     *
     * @param string $type
     *
     * @return Bedroom
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set apartments
     *
     * @param \Sinmar\ApartmentBundle\Entity\Apartment $apartments
     *
     * @return Bedroom
     */
    public function setApartments(\Sinmar\ApartmentBundle\Entity\Apartment $apartments = null)
    {
        $this->apartments = $apartments;

        return $this;
    }

    /**
     * Get apartments
     *
     * @return \Sinmar\ApartmentBundle\Entity\Apartment
     */
    public function getApartments()
    {
        return $this->apartments;
    }
}
