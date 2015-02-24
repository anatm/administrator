<?php
// src/Acme/DemoBundle/Admin/PostAdmin.php

namespace Dscorp\WarriorsBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class paginaAdmin extends Admin 
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('tituloPagina')
            ->add('urlimagenPagina')
            ->add('descripcionPagina')
            ->add('menu')
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('tituloPagina')
            ->add('urlimagenPagina')
            ->add('descripcionPagina')
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('tituloPagina')
            ->add('urlimagenPagina')
            ->add('descripcionPagina')
        ;
    }
}