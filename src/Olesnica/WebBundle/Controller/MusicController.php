<?php

namespace Olesnica\WebBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MusicController extends Controller
{
    public function indexAction()
    {
        return $this->render('OlesnicaWebBundle:Music:index.html.twig');
    }
}
