<?php

namespace Olesnica\WebBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class RideOfKingsController extends Controller
{
    public function indexAction()
    {
        return $this->render('OlesnicaWebBundle:RideOfKings:index.html.twig');
    }
}
