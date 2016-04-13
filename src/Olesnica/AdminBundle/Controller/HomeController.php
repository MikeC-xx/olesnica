<?php

namespace Olesnica\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Olesnica\AdminBundle\Entity\Home;
use Olesnica\AdminBundle\Form\HomeType;

class HomeController extends Controller
{
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $data = $em->getRepository('OlesnicaAdminBundle:Home')->findBy(array('id' => 1))[0];

        $form = $this->createForm(new HomeType(), $data, array());

        if ($request->getMethod() === 'POST') {
          $form->handleRequest($request);

          if ($form->isValid()) {

            $em->persist($data);
            $em->flush();

            $this->addFlash(
              'success',
              'Záznam byl úspěšně uložen.'
            );

            return $this->redirectToRoute('olesnica_admin_home');
          }
        }

        return $this->render('OlesnicaAdminBundle:Home:index.html.twig', array('form' => $form->createView()));
    }
}
