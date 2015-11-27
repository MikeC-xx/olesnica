<?php

namespace Olesnica\WebBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Olesnica\AdminBundle\Entity\Event;
use Olesnica\AdminBundle\Entity\EventRepository;

class EventController extends Controller
{
    public function indexAction()
    {
        return $this->render('OlesnicaWebBundle:Event:index.html.twig');
    }

    public function showAction(Event $event)
    {
        return $this->render('OlesnicaWebBundle:Event:show.html.twig', array('event' => $event));
    }
}
