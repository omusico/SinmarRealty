<?php
// src/AppBundle/Entity/User.php

namespace Sinmar\ApartmentBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="User")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToMany(targetEntity="Message", mappedBy="postedBy")
     */
    private $messages;

    /**
     * @ORM\OneToMany(targetEntity="Message", mappedBy="editedBy")
     */
    private $editedMessages;

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Add message
     *
     * @param \Sinmar\ApartmentBundle\Entity\Message $message
     *
     * @return User
     */
    public function addMessage(\Sinmar\ApartmentBundle\Entity\Message $message)
    {
        $this->messages[] = $message;

        return $this;
    }

    /**
     * Remove message
     *
     * @param \Sinmar\ApartmentBundle\Entity\Message $message
     */
    public function removeMessage(\Sinmar\ApartmentBundle\Entity\Message $message)
    {
        $this->messages->removeElement($message);
    }

    /**
     * Get messages
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMessages()
    {
        return $this->messages;
    }

    /**
     * Add editedMessage
     *
     * @param \Sinmar\ApartmentBundle\Entity\Message $editedMessage
     *
     * @return User
     */
    public function addEditedMessage(\Sinmar\ApartmentBundle\Entity\Message $editedMessage)
    {
        $this->editedMessages[] = $editedMessage;

        return $this;
    }

    /**
     * Remove editedMessage
     *
     * @param \Sinmar\ApartmentBundle\Entity\Message $editedMessage
     */
    public function removeEditedMessage(\Sinmar\ApartmentBundle\Entity\Message $editedMessage)
    {
        $this->editedMessages->removeElement($editedMessage);
    }

    /**
     * Get editedMessages
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEditedMessages()
    {
        return $this->editedMessages;
    }
}
