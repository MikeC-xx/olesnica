<?php

namespace Olesnica\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Knp\DoctrineBehaviors\Model as ORMBehaviors;

/**
 * Attachment
 */
class Attachment
{
    use ORMBehaviors\Sluggable\Sluggable;

    private $file;

    public function setFile(UploadedFile $file = null)
    {
        $this->file = $file;
    }

    public function getFile()
    {
        return $this->file;
    }

    public function getSluggableFields()
    {
        return array('title', 'id');
    }

    public function getAbsolutePath()
    {
        return null === $this->getPath()
            ? null
            : $this->getUploadRootDir().'/'.$this->getPath();
    }

    public function getWebPath()
    {
        return null === $this->getPath()
            ? null
            : $this->getUploadDir().'/'.$this->getPath();
    }

    protected function getUploadRootDir()
    {
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }

    protected function getUploadDir()
    {
        return 'content/attachments';
    }

    public function preUpload()
    {
        if (null !== $this->getFile()) {
            // do whatever you want to generate a unique name
            //$path = sha1(uniqid(mt_rand(), true));
            //$this->setPath($path.'.'.$this->file->guessExtension());
            //$this->setPath($this->getSlug().'.'.$this->file->guessExtension());
        }
    }

    public function removeUpload()
    {
        if ($file = $this->getAbsolutePath()) {
            unlink($file);
        }
    }

    public function upload()
    {
        // The file property can be empty if the field is not required
        if (null === $this->getFile()) {
            return;
        }

        // Use the original file name here but you should
        // sanitize it at least to avoid any security issues

        // move takes the target directory and then the
        // target filename to move to
        $this->setPath($this->getSlug().'.'.$this->file->guessExtension());
        $this->getFile()->move(
            $this->getUploadRootDir(),
            $this->getPath()
        );

        // Set the path property to the filename where you've saved the file
        //$this->path = $this->file->getClientOriginalName();

        // Clean up the file property as you won't need it anymore
        $this->setFile(null);
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
     * @var string
     */
    private $path;

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
     * @return Attachment
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
     * Set path
     *
     * @param string $path
     * @return Attachment
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get path
     *
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set event
     *
     * @param \Olesnica\AdminBundle\Entity\Event $event
     * @return Attachment
     */
    public function setEvent(\Olesnica\AdminBundle\Entity\Event $event)
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
}
