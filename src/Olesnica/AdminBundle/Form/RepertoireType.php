<?php

namespace Olesnica\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class RepertoireType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('repertoireTitle', null, array(
              'label' => 'Repertoár – nadpis',
              'attr' => array(
                'autocomplete' => 'off'
              )
            ))
            ->add('repertoireText', null, array(
              'label' => 'Repertoár – text',
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
            'data_class' => 'Olesnica\AdminBundle\Entity\Repertoire'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'olesnica_adminbundle_repertoire';
    }
}
