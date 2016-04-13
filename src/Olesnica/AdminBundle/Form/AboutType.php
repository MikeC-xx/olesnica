<?php

namespace Olesnica\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AboutType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('aboutTitle', null, array(
              'label' => 'O souboru – nadpis',
              'attr' => array(
                'autocomplete' => 'off'
              )
            ))
            ->add('aboutText', null, array(
              'label' => 'O souboru – text',
              'attr' => array(
                'class' => 'wysiwyg',
                'autocomplete' => 'off'
              )
            ))
            ->add('historyTitle', null, array(
              'label' => 'Historie – nadpis',
              'attr' => array(
                'autocomplete' => 'off'
              )
            ))
            ->add('historyText', null, array(
              'label' => 'Historie – text',
              'attr' => array(
                'class' => 'wysiwyg',
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
            'data_class' => 'Olesnica\AdminBundle\Entity\About'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'olesnica_adminbundle_about';
    }
}
