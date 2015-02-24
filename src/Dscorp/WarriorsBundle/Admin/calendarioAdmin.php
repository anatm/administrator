<?php
// src/Acme/DemoBundle/Admin/PostAdmin.php

namespace Dscorp\WarriorsBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class calendarioAdmin extends Admin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('diaCalendario')
            ->add('mesCalendario')
            ->add('anioCalendario')
            ->add('tituloCalendario')
            ->add('descripcionCalendario')
            
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('diaCalendario')
            ->add('mesCalendario')
            ->add('anioCalendario')
            ->add('tituloCalendario')
            ->add('descripcionCalendario')
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('diaCalendario')
             ->add('mesCalendario')
            ->add('anioCalendario')
            ->add('tituloCalendario')
            ->add('descripcionCalendario')
        ;
        ;
    }
}