<?php

namespace Olesnica\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Olesnica\AdminBundle\Entity\About;
use Olesnica\AdminBundle\Form\AboutType;

class AboutController extends Controller
{
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $data = $em->getRepository('OlesnicaAdminBundle:About')->findBy(array('id' => 1))[0];

        $form = $this->createForm(new AboutType(), $data, array());

        if ($request->getMethod() === 'POST') {
          $form->handleRequest($request);

          if ($form->isValid()) {

            $em->persist($data);
            $em->flush();

            $this->addFlash(
              'success',
              'Záznam byl úspěšně uložen.'
            );

            return $this->redirectToRoute('olesnica_admin_about');
          }
        }

        return $this->render('OlesnicaAdminBundle:About:index.html.twig', array('form' => $form->createView()));
    }
}
