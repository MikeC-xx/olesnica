<?php

namespace Olesnica\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Repertoire
 */
class Repertoire
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $repertoireTitle;

    /**
     * @var string
     */
    private $repertoireText;


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
     * Set repertoireTitle
     *
     * @param string $repertoireTitle
     * @return Repertoire
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
     * @return Repertoire
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
}
