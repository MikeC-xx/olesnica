<?php

namespace Olesnica\WebBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Olesnica\AdminBundle\Entity\Event;
use Olesnica\AdminBundle\Entity\EventRepository;

class EventController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $latestEvents = $em->getRepository('OlesnicaAdminBundle:Event')->getLatestEvents();

        $recentEvents = $em->getRepository('OlesnicaAdminBundle:Event')->getRecentEvents(5);

        return $this->render('OlesnicaWebBundle:Event:index.html.twig', array('latestEvents' => $latestEvents, 'recentEvents' => $recentEvents));
    }

    public function showAction(Event $event)
    {
        return $this->render('OlesnicaWebBundle:Event:show.html.twig', array('event' => $event));
    }

    public function recentAction()
    {
        $em = $this->getDoctrine()->getManager();

        $recentEvents = $em->getRepository('OlesnicaAdminBundle:Event')->getRecentEvents();

        return $this->render('OlesnicaWebBundle:Event:recent.html.twig', array('recentEvents' => $recentEvents));
    }
}
