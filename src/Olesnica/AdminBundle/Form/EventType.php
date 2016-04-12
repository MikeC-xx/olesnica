<?php

namespace Olesnica\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Olesnica\AdminBundle\Form\EventListener\SubmitEventSubscriber;

class EventType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', null, array(
              'label' => 'Název',
              'attr' => array(
                'autocomplete' => 'off'
              )
            ))
            ->add('performance', null, array(
              'label' => 'Akce je vystoupení'
            ))
            ->add('startDate', 'date', array(
              'label' => 'Datum'
            ))
            ->add('setStartTime', 'checkbox', array(
              'label' => 'Zadat čas',
              'mapped' => false,
              'attr' => array(
                'class' => 'set-start-time'
              )
            ))
            ->add('startTime', 'time', array(
              'label' => 'Čas',
              'row_attr' => array(
                'id' => 'start-time'
              )
            ))
            ->add('setFinishDate', 'checkbox', array(
              'label' => 'Zadat konec akce',
              'mapped' => false,
              'attr' => array(
                'class' => 'set-finish-date'
              )
            ))
            ->add('finishDate', 'date', array(
              'label' => 'Datum',
              'row_attr' => array(
                'id' => 'finish-date'
              )
            ))
            ->add('setFinishTime', 'checkbox', array(
              'label' => 'Zadat čas',
              'mapped' => false,
              'attr' => array(
                'class' => 'set-finish-time'
              )
            ))
            ->add('finishTime', 'time', array(
              'label' => 'Čas',
              'row_attr' => array(
                'id' => 'finish-time'
              )
            ))
            ->add('location', null, array(
              'label' => 'Místo',
              'attr' => array(
                'class' => 'location'
              )
            ))
            ->add('latitude', 'hidden', array(
              'attr' => array(
                'class' => 'latitude'
              )
            ))
            ->add('longitude', 'hidden', array(
              'attr' => array(
                'class' => 'longitude'
              )
            ))
            ->add('shortDescription', null, array(
              'label' => 'Krátký popis',
              'attr' => array(
                'autocomplete' => 'off'
              )
            ))
            ->add('longDescription', 'textarea', array(
              'label' => 'Dlouhý popis',
              'required' => false,
              'attr' => array(
                'class' => 'wysiwyg',
                'autocomplete' => 'off'
              )
            ))
            ->add('galleryUrl', null, array(
              'label' => 'Google Photos URL',
              'required' => false,
              'attr' => array(
                'autocomplete' => 'off'
              )
            ))
            ->add('attachments', 'collection', array(
              'label' => 'Přílohy',
              'type' => new AttachmentType(),
              'allow_add' => true,
              'allow_delete' => true
            ))
            ->add('save', 'submit', array(
              'label' => 'Uložit',
              'attr' => array(
                'class' => 'btn-success'
              )
            ))
            ->addEventSubscriber(new SubmitEventSubscriber());
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Olesnica\AdminBundle\Entity\Event'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'olesnica_adminbundle_event';
    }
}
