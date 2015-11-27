<?php

namespace Olesnica\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Gallery
 */
class Gallery
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var \Olesnica\AdminBundle\Entity\Event
     */
    private $event;


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
     * Set title
     *
     * @param string $title
     * @return Gallery
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set event
     *
     * @param \Olesnica\AdminBundle\Entity\Event $event
     * @return Gallery
     */
    public function setEvent(\Olesnica\AdminBundle\Entity\Event $event = null)
    {
        $this->event = $event;

        return $this;
    }

    /**
     * Get event
     *
     * @return \Olesnica\AdminBundle\Entity\Event 
     */
    public function getEvent()
    {
        return $this->event;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $pictures;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->pictures = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add pictures
     *
     * @param \Olesnica\AdminBundle\Entity\Picture $pictures
     * @return Gallery
     */
    public function addPicture(\Olesnica\AdminBundle\Entity\Picture $pictures)
    {
        $this->pictures[] = $pictures;

        return $this;
    }

    /**
     * Remove pictures
     *
     * @param \Olesnica\AdminBundle\Entity\Picture $pictures
     */
    public function removePicture(\Olesnica\AdminBundle\Entity\Picture $pictures)
    {
        $this->pictures->removeElement($pictures);
    }

    /**
     * Get pictures
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPictures()
    {
        return $this->pictures;
    }
}
