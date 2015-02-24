<?php

namespace Dscorp\WarriorsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('DscorpWarriorsBundle:Default:index.html.twig', array('name' => $name));
    }
}
