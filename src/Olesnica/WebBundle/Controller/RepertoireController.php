<?php

namespace Olesnica\WebBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Olesnica\AdminBundle\Entity\Event;
use Olesnica\AdminBundle\Entity\EventRepository;

class RepertoireController extends Controller
{
    public function indexAction()
    {

        $em = $this->getDoctrine()->getManager();

        $recentPerformances = $em->getRepository('OlesnicaAdminBundle:Event')->getRecentEvents(5, true);

        return $this->render('OlesnicaWebBundle:Repertoire:index.html.twig', array('recentPerformances' => $recentPerformances));
    }
}
