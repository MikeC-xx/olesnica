<?php

namespace Olesnica\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class GalleryController extends Controller
{
    public function indexAction()
    {
        return $this->render('OlesnicaAdminBundle:Gallery:index.html.twig');
    }
}
