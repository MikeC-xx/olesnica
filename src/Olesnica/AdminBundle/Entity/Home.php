<?php

namespace Olesnica\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Home
 */
class Home
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $welcomeTitle;

    /**
     * @var string
     */
    private $welcomeText;

    /**
     * @var string
     */
    private $repertoireTitle;

    /**
     * @var string
     */
    private $repertoireText;

    /**
     * @var string
     */
    private $rideOfKingsTitle;

    /**
     * @var string
     */
    private $rideOfKingsText;


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
     * Set welcomeTitle
     *
     * @param string $welcomeTitle
     * @return Home
     */
    public function setWelcomeTitle($welcomeTitle)
    {
        $this->welcomeTitle = $welcomeTitle;

        return $this;
    }

    /**
     * Get welcomeTitle
     *
     * @return string 
     */
    public function getWelcomeTitle()
    {
        return $this->welcomeTitle;
    }

    /**
     * Set welcomeText
     *
     * @param string $welcomeText
     * @return Home
     */
    public function setWelcomeText($welcomeText)
    {
        $this->welcomeText = $welcomeText;

        return $this;
    }

    /**
     * Get welcomeText
     *
     * @return string 
     */
    public function getWelcomeText()
    {
        return $this->welcomeText;
    }

    /**
     * Set repertoireTitle
     *
     * @param string $repertoireTitle
     * @return Home
     */
    public function setRepertoireTitle($repertoireTitle)
    {
        $this->repertoireTitle = $repertoireTitle;

        return $this;
    }

    /**
     * Get repertoireTitle
     *
     * @return string 
     */
    public function getRepertoireTitle()
    {
        return $this->repertoireTitle;
    }

    /**
     * Set repertoireText
     *
     * @param string $repertoireText
     * @return Home
     */
    public function setRepertoireText($repertoireText)
    {
        $this->repertoireText = $repertoireText;

        return $this;
    }

    /**
     * Get repertoireText
     *
     * @return string 
     */
    public function getRepertoireText()
    {
        return $this->repertoireText;
    }

    /**
     * Set rideOfKingsTitle
     *
     * @param string $rideOfKingsTitle
     * @return Home
     */
    public function setRideOfKingsTitle($rideOfKingsTitle)
    {
        $this->rideOfKingsTitle = $rideOfKingsTitle;

        return $this;
    }

    /**
     * Get rideOfKingsTitle
     *
     * @return string 
     */
    public function getRideOfKingsTitle()
    {
        return $this->rideOfKingsTitle;
    }

    /**
     * Set rideOfKingsText
     *
     * @param string $rideOfKingsText
     * @return Home
     */
    public function setRideOfKingsText($rideOfKingsText)
    {
        $this->rideOfKingsText = $rideOfKingsText;

        return $this;
    }

    /**
     * Get rideOfKingsText
     *
     * @return string 
     */
    public function getRideOfKingsText()
    {
        return $this->rideOfKingsText;
    }
}
