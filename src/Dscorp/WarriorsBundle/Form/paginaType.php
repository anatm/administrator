<?php

namespace Dscorp\WarriorsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class paginaType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('tituloPagina')
            ->add('urlimagenPagina')
            ->add('descripcionPagina')
            ->add('menu')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Dscorp\WarriorsBundle\Entity\pagina'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'dscorp_warriorsbundle_pagina';
    }
}
