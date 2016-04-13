<?php

namespace Olesnica\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Music
 */
class Music
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $musicTitle;

    /**
     * @var string
     */
    private $musicText;


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
     * Set musicTitle
     *
     * @param string $musicTitle
     * @return Music
     */
    public function setMusicTitle($musicTitle)
    {
        $this->musicTitle = $musicTitle;

        return $this;
    }

    /**
     * Get musicTitle
     *
     * @return string 
     */
    public function getMusicTitle()
    {
        return $this->musicTitle;
    }

    /**
     * Set musicText
     *
     * @param string $musicText
     * @return Music
     */
    public function setMusicText($musicText)
    {
        $this->musicText = $musicText;

        return $this;
    }

    /**
     * Get musicText
     *
     * @return string 
     */
    public function getMusicText()
    {
        return $this->musicText;
    }
}
