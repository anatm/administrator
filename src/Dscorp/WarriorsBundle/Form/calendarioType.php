<?php

namespace Dscorp\WarriorsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class calendarioType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('diaCalendario')
            ->add('mesCalendario')
            ->add('anioCalendario')
            ->add('tituloCalendario')
            ->add('descripcionCalendario')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Dscorp\WarriorsBundle\Entity\calendario'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'dscorp_warriorsbundle_calendario';
    }
}
