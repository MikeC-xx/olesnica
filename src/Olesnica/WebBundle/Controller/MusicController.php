<?php

namespace Olesnica\WebBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MusicController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $data = $em->getRepository('OlesnicaAdminBundle:Music')->findBy(array('id' => 1))[0];

        return $this->render('OlesnicaWebBundle:Music:index.html.twig', array('data' => $data));
    }
}
