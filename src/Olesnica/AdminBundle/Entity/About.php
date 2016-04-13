<?php

namespace Olesnica\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * About
 */
class About
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $aboutTitle;

    /**
     * @var string
     */
    private $aboutText;

    /**
     * @var string
     */
    private $historyTitle;

    /**
     * @var string
     */
    private $historyText;


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
     * Set aboutTitle
     *
     * @param string $aboutTitle
     * @return About
     */
    public function setAboutTitle($aboutTitle)
    {
        $this->aboutTitle = $aboutTitle;

        return $this;
    }

    /**
     * Get aboutTitle
     *
     * @return string 
     */
    public function getAboutTitle()
    {
        return $this->aboutTitle;
    }

    /**
     * Set aboutText
     *
     * @param string $aboutText
     * @return About
     */
    public function setAboutText($aboutText)
    {
        $this->aboutText = $aboutText;

        return $this;
    }

    /**
     * Get aboutText
     *
     * @return string 
     */
    public function getAboutText()
    {
        return $this->aboutText;
    }

    /**
     * Set historyTitle
     *
     * @param string $historyTitle
     * @return About
     */
    public function setHistoryTitle($historyTitle)
    {
        $this->historyTitle = $historyTitle;

        return $this;
    }

    /**
     * Get historyTitle
     *
     * @return string 
     */
    public function getHistoryTitle()
    {
        return $this->historyTitle;
    }

    /**
     * Set historyText
     *
     * @param string $historyText
     * @return About
     */
    public function setHistoryText($historyText)
    {
        $this->historyText = $historyText;

        return $this;
    }

    /**
     * Get historyText
     *
     * @return string 
     */
    public function getHistoryText()
    {
        return $this->historyText;
    }
}
