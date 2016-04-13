<?php

namespace Olesnica\WebBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class GalleryController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $galleries = $em->getRepository('OlesnicaAdminBundle:Event')->getGalleries();

        return $this->render('OlesnicaWebBundle:Gallery:index.html.twig', array('galleries' => $galleries));
    }
}
