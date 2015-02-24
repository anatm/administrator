<?php
// src/Acme/DemoBundle/Admin/PostAdmin.php

namespace Dscorp\WarriorsBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class mapaAdmin extends Admin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('urlimagenMapa')
            ->add('descripcionMapa')
           
            
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('urlimagenMapa')
            ->add('descripcionMapa')
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('urlimagenMapa')
            ->add('descripcionMapa')
             
        ;
        ;
    }
}