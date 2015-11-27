<?php

namespace Olesnica\AdminBundle\Form\EventListener;

use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class SubmitEventSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return array(FormEvents::SUBMIT => 'submitData');
    }

    public function submitData(FormEvent $event)
    {
        $form = $event->getForm();
        $entity = $form->getData();
        if ($form->get('setStartTime')->getData() === false) {
          $entity->setStartTime(null);
        }
        if ($form->get('setFinishDate')->getData() === false) {
          $entity->setFinishTime(null);
          $entity->setFinishDate(null);
        } else if ($form->get('setFinishTime')->getData() === false) {
          $entity->setFinishTime(null);
        }
    }
}
