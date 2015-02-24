<?php

namespace Dscorp\WarriorsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class accionmenuType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('descripcionAccionmenu')
            ->add('menu')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Dscorp\WarriorsBundle\Entity\accionmenu'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'dscorp_warriorsbundle_accionmenu';
    }
}
