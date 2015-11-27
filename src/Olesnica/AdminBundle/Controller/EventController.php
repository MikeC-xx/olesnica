<?php

namespace Olesnica\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Olesnica\AdminBundle\Entity\Event;
use Olesnica\AdminBundle\Entity\EventRepository;
use Olesnica\AdminBundle\Form\EventType;
use Olesnica\AdminBundle\Entity\Attachment;

class EventController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $events = $em->getRepository('OlesnicaAdminBundle:Event')->findAll();

        return $this->render('OlesnicaAdminBundle:Event:index.html.twig', array('events' => $events));
    }

    public function editAction(Event $event = null, Request $request)
    {
        if ($event === null) {
          $event = new Event();
        }

        $em = $this->getDoctrine()->getManager();

        $form = $this->createForm(new EventType(), $event, array());

        /*
        $ajax = $request->isXmlHttpRequest();

        if ($request->getMethod() == 'POST') {
          $form->handleRequest($request);

          if ($form->isValid()) {

          } else {
            if ($ajax) {
              return new Response(json_encode(array(
                'status' => 'error',
                'errors' => 'asdf'
              )));
            }
          }
        }
        */
        if ($request->getMethod() == 'POST') {
          $form->handleRequest($request);

          if ($form->isValid()) {
            //$event = $form->getData();

            $em->persist($event);
            $em->flush();

            $this->addFlash(
              'success',
              'Záznam byl úspěšně uložen.'
            );

            return $this->redirectToRoute('olesnica_admin_events');
          }
        }
        return $this->render('OlesnicaAdminBundle:Event:edit.html.twig', array('form' => $form->createView()));
    }

    public function deleteAction(Event $event)
    {
        $em = $this->getDoctrine()->getManager();

        $em->remove($event);
        $em->flush();

        $this->addFlash(
          'success',
          'Záznam byl úspěšně vymazán.'
        );

        return $this->redirectToRoute('olesnica_admin_events');
    }
}
