<?php

namespace Sinmar\ApartmentBundle\Entity;

/**
 * Pets
 */
class Pets
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
     * @var integer
     *
     * @ORM\Column(name="pets", type="integer")
     */
    private $pets;

    /**
     * @var integer
     *
     * @ORM\Column(name="cats", type="integer")
     */
    private $cats;

    /**
     * @var integer
     *
     * @ORM\Column(name="dogs", type="integer")
     */
    private $dogs;


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
     * @return Pets
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
}

