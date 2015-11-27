<?php

namespace Olesnica\WebBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Olesnica\AdminBundle\Entity\Event;
use Olesnica\AdminBundle\Entity\EventRepository;

class HomepageController extends Controller
{
    public function indexAction()
    {

        $em = $this->getDoctrine()->getManager();

        $recentEvents = $em->getRepository('OlesnicaAdminBundle:Event')->getLatestEvents(5);

        return $this->render('OlesnicaWebBundle:Home:index.html.twig', array('recentEvents' => $recentEvents));
    }
}
