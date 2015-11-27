<?php

namespace Olesnica\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Olesnica\WebBundle\Entity\Event;
use Olesnica\WebBundle\Entity\EventRepository;

class GalleryController extends Controller
{
    public function indexAction()
    {
        return $this->render('OlesnicaAdminBundle:Gallery:index.html.twig');
    }
}
