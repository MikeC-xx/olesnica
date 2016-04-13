<?php

namespace Olesnica\WebBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AboutController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $data = $em->getRepository('OlesnicaAdminBundle:About')->findBy(array('id' => 1))[0];

        return $this->render('OlesnicaWebBundle:About:index.html.twig', array('data' => $data));
    }
}
