<?php

namespace Olesnica\WebBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormError;

class ContactController extends Controller
{
    public function indexAction(Request $request)
    {

        $form = $this->createFormBuilder()
            ->add('email', 'email', [
                'label' => 'Email',
                'attr' => [
                    'placeholder' => 'Váš email'
                ]
            ])
            ->add('body', 'textarea', [
                'label' => 'Zpráva',
                'attr' => [
                  'placeholder' => 'Váše zpráva',
                  'rows' => 4
                ]
            ])
            ->addEventListener(FormEvents::POST_SUBMIT, function ($event) {
                $data = $event->getData();
                $form = $event->getForm();

                if ($data === null) {
                    return;
                }

                if (!$data['body']) {
                    $form->get('body')->addError(new FormError('Zadejte prosím text Vaší zprávy.'));
                }

                if (!$data['email']) {
                    $form->get('email')->addError(new FormError('Zadejte prosím Váš email.'));
                } else if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                    $form->get('email')->addError(new FormError('Zadejte prosím email ve správném tvaru.'));
                }
            })
            ->getForm();

        if ($request->getMethod() === 'POST') {
            $form->handleRequest($request);

            if ($form->isValid()) {
                $data = $form->getData();
                $message = \Swift_Message::newInstance()
                    ->setSubject('Dotaz z www.olesnica.cz')
                    ->setFrom($data['email'])
                    ->setTo('olesnica@olesnica.cz')
                    ->setBody(
                        $this->renderView(
                            'OlesnicaWebBundle:Email:contact.html.twig',
                            ['body' => $data['body']]
                        ),
                        'text/html'
                    );

                $this->get('mailer')->send($message);

                $this->addFlash(
                    'success',
                    'Váš dotaz byl úspěšně odeslán, brzy Vás budeme kontaktovat. Děkujeme.'
                );

                return $this->redirectToRoute('olesnica_web_contact');
            } else {
                $this->addFlash(
                    'danger',
                    'Váš dotaz nebyl odeslán. Zkontrolujte prosím kontaktní formulář.'
                );
            }
        }

        return $this->render('OlesnicaWebBundle:Contact:index.html.twig', ['form' => $form->createView()]);
    }
}
