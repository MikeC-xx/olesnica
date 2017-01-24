<?php

namespace Olesnica\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Olesnica\AdminBundle\Event;
use Olesnica\AdminBundle\EventRepository;

class AttachmentType extends AbstractType
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
              'required' => true,
              'attr' => array(
                'autocomplete' => 'off'
              )
            ))
            ->add('file', 'file', array(
              'label' => 'Soubor',
              'required' => true
            ))
            ->add('path', null, array(
              'label' => 'Soubor',
              'required' => true,
              'attr' => array(
                'readonly' => true
              )
            ))
            ->add('main', null, array(
              'label' => 'Hlavní'
            ))
            ->add('delete', 'button', array(
              'label' => 'Smazat přílohu',
              'attr' => array(
                'class' => 'btn-xs btn-danger center-block',
                'data-action' => 'delete'
              )
            ))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Olesnica\AdminBundle\Entity\Attachment',
            'validation_groups' => function (FormInterface $form) {
              $data = $form->getData();

              if ($data->getPath()) {
                  return array('Default', 'path');
              } else {
                  return array('Default', 'file');
              }
            }
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'olesnica_adminbundle_attachment';
    }
}
