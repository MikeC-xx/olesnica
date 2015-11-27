<?php

namespace Olesnica\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Picture
 */
class Picture
{
    
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $exifDatetime;

    /**
     * @var string
     */
    private $file;

    /**
     * @var \Olesnica\AdminBundle\Entity\Gallery
     */
    private $gallery;


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
     * Set exifDatetime
     *
     * @param \DateTime $exifDatetime
     * @return Picture
     */
    public function setExifDatetime($exifDatetime)
    {
        $this->exifDatetime = $exifDatetime;

        return $this;
    }

    /**
     * Get exifDatetime
     *
     * @return \DateTime 
     */
    public function getExifDatetime()
    {
        return $this->exifDatetime;
    }

    /**
     * Set file
     *
     * @param string $file
     * @return Picture
     */
    public function setFile($file)
    {
        $this->file = $file;

        return $this;
    }

    /**
     * Get file
     *
     * @return string 
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * Set gallery
     *
     * @param \Olesnica\AdminBundle\Entity\Gallery $gallery
     * @return Picture
     */
    public function setGallery(\Olesnica\AdminBundle\Entity\Gallery $gallery = null)
    {
        $this->gallery = $gallery;

        return $this;
    }

    /**
     * Get gallery
     *
     * @return \Olesnica\AdminBundle\Entity\Gallery 
     */
    public function getGallery()
    {
        return $this->gallery;
    }
}
