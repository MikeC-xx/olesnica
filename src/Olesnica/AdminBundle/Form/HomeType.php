<?php

namespace Olesnica\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class HomeType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('welcomeTitle', null, array(
              'label' => 'Vítejte – nadpis',
              'attr' => array(
                'class' => 'wysiwyg',
                'autocomplete' => 'off'
              )
            ))
            ->add('welcomeText', null, array(
              'label' => 'Vítejte – text',
              'attr' => array(
                'autocomplete' => 'off'
              )
            ))
            ->add('repertoireTitle', null, array(
              'label' => 'Vystoupení – nadpis',
              'attr' => array(
                'autocomplete' => 'off'
              )
            ))
            ->add('repertoireText', null, array(
              'label' => 'Vystoupení – text',
              'attr' => array(
                'autocomplete' => 'off'
              )
            ))
            ->add('rideOfKingsTitle', null, array(
              'label' => 'Jízda králů – nadpis',
              'attr' => array(
                'autocomplete' => 'off'
              )
            ))
            ->add('rideOfKingsText', null, array(
              'label' => 'Jízda králů – text',
              'attr' => array(
                'autocomplete' => 'off'
              )
            ))
            ->add('save', 'submit', array(
              'label' => 'Uložit',
              'attr' => array(
                'class' => 'btn-success'
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
            'data_class' => 'Olesnica\AdminBundle\Entity\Home'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'olesnica_adminbundle_home';
    }
}
