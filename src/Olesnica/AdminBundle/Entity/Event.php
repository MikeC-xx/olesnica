<?php

namespace Olesnica\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Model as ORMBehaviors;

/**
 * Event
 */
class Event
{
    use ORMBehaviors\Sluggable\Sluggable;

    public function __construct()
    {
        $this->attachments = new \Doctrine\Common\Collections\ArrayCollection();
        $this->title = 'Nová akce';
        $this->startDate = new \DateTime();
        $this->latitude = 49.5671764;
        $this->longitude = 17.4114814;
    }

    public function getDuration()
    {
        $startDate = $this->getStartDate();
        $startTime = $this->getStartTime();
        $finishDate = $this->getFinishDate();
        $finishTime = $this->getFinishTime();
        if (is_null($finishDate)) {
            if (is_null($startTime)) {
                return $startDate->format('j. n. Y');
            } else {
                return $startDate->format('j. n. Y').' od '.$startTime->format('H.i').' hodin';
            }
        } else {
            if (is_null($finishTime)) {
                if (is_null($startTime)) {
                    if ($startDate->format('Y') == $finishDate->format('Y')) {
                        if ($startDate->format('n') == $finishDate->format('n')) {
                            return 'od '.$startDate->format('j.').' do '.$finishDate->format('j. n. Y');
                        } else {
                            return 'od '.$startDate->format('j. n.').' do '.$finishDate->format('j. n. Y');
                        }
                    } else {
                        return 'od '.$startDate->format('j. n. Y').' do '.$finishDate->format('j. n. Y');
                    }
                } else {
                    return 'od '.$startDate->format('j. n. Y').' '.$startTime->format('H.i').' do '.$finishDate->format('j. n. Y');
                }
            } else {
                if ($startDate == $finishDate) {
                    if (is_null($startTime)) {
                        return
                          $startDate->format('j. n. Y').
                          ' do '.$finishTime->format('H.i').' hodin';
                    } else {
                        return
                          $startDate->format('j. n. Y').' od '.$startTime->format('H.i').
                          ' do '.$finishTime->format('H.i').' hodin';
                    }
                } else {
                    if (is_null($startTime)) {
                        return
                          'od '.$startDate->format('j. n. Y').' do '.
                          $finishDate->format('j. n. Y').' '.$finishTime->format('H.i').' hodin';
                    } else {
                        return
                          'od '.$startDate->format('j. n. Y').' '.$startTime->format('H.i').' hodin do '.
                          $finishDate->format('j. n. Y').' '.$finishTime->format('H.i').' hodin';
                    }
                }
            }
        }
    }

    public function getSluggableFields()
    {
        return array('title', 'id');
    }

    /**
     * Add attachments
     *
     * @param \Olesnica\AdminBundle\Entity\Attachment $attachments
     * @return Event
     */
    public function addAttachment(\Olesnica\AdminBundle\Entity\Attachment $attachments)
    {
        $this->attachments[] = $attachments;
        $attachments->setEvent($this);

        return $this;
    }

    /**
     * Remove attachments
     *
     * @param \Olesnica\AdminBundle\Entity\Attachment $attachments
     */
    public function removeAttachment(\Olesnica\AdminBundle\Entity\Attachment $attachments)
    {
        $this->attachments->removeElement($attachments);
        $attachments->setEvent(null);
    }
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var boolean
     */
    private $performance;

    /**
     * @var \DateTime
     */
    private $startDate;

    /**
     * @var \DateTime
     */
    private $startTime;

    /**
     * @var \DateTime
     */
    private $finishDate;

    /**
     * @var \DateTime
     */
    private $finishTime;

    /**
     * @var string
     */
    private $location;

    /**
     * @var float
     */
    private $latitude;

    /**
     * @var float
     */
    private $longitude;

    /**
     * @var string
     */
    private $shortDescription;

    /**
     * @var string
     */
    private $longDescription;

    /**
     * @var \Olesnica\AdminBundle\Entity\Gallery
     */
    private $gallery;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $attachments;


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
     * @return Event
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
     * Set performance
     *
     * @param boolean $performance
     * @return Event
     */
    public function setPerformance($performance)
    {
        $this->performance = $performance;

        return $this;
    }

    /**
     * Get performance
     *
     * @return boolean 
     */
    public function getPerformance()
    {
        return $this->performance;
    }

    /**
     * Set startDate
     *
     * @param \DateTime $startDate
     * @return Event
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * Get startDate
     *
     * @return \DateTime 
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * Set startTime
     *
     * @param \DateTime $startTime
     * @return Event
     */
    public function setStartTime($startTime)
    {
        $this->startTime = $startTime;

        return $this;
    }

    /**
     * Get startTime
     *
     * @return \DateTime 
     */
    public function getStartTime()
    {
        return $this->startTime;
    }

    /**
     * Set finishDate
     *
     * @param \DateTime $finishDate
     * @return Event
     */
    public function setFinishDate($finishDate)
    {
        $this->finishDate = $finishDate;

        return $this;
    }

    /**
     * Get finishDate
     *
     * @return \DateTime 
     */
    public function getFinishDate()
    {
        return $this->finishDate;
    }

    /**
     * Set finishTime
     *
     * @param \DateTime $finishTime
     * @return Event
     */
    public function setFinishTime($finishTime)
    {
        $this->finishTime = $finishTime;

        return $this;
    }

    /**
     * Get finishTime
     *
     * @return \DateTime 
     */
    public function getFinishTime()
    {
        return $this->finishTime;
    }

    /**
     * Set location
     *
     * @param string $location
     * @return Event
     */
    public function setLocation($location)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Get location
     *
     * @return string 
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Set latitude
     *
     * @param float $latitude
     * @return Event
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * Get latitude
     *
     * @return float 
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Set longitude
     *
     * @param float $longitude
     * @return Event
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * Get longitude
     *
     * @return float 
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Set shortDescription
     *
     * @param string $shortDescription
     * @return Event
     */
    public function setShortDescription($shortDescription)
    {
        $this->shortDescription = $shortDescription;

        return $this;
    }

    /**
     * Get shortDescription
     *
     * @return string 
     */
    public function getShortDescription()
    {
        return $this->shortDescription;
    }

    /**
     * Set longDescription
     *
     * @param string $longDescription
     * @return Event
     */
    public function setLongDescription($longDescription)
    {
        $this->longDescription = $longDescription;

        return $this;
    }

    /**
     * Get longDescription
     *
     * @return string 
     */
    public function getLongDescription()
    {
        return $this->longDescription;
    }

    /**
     * Set gallery
     *
     * @param \Olesnica\AdminBundle\Entity\Gallery $gallery
     * @return Event
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

    /**
     * Get attachments
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAttachments()
    {
        return $this->attachments;
    }
}
