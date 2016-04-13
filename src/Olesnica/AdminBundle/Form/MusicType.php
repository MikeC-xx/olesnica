<?php

namespace Olesnica\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MusicType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('musicTitle', null, array(
              'label' => 'Hudba – nadpis',
              'attr' => array(
                'autocomplete' => 'off'
              )
            ))
            ->add('musicText', null, array(
              'label' => 'Hudba – text',
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
            'data_class' => 'Olesnica\AdminBundle\Entity\Music'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'olesnica_adminbundle_music';
    }
}
