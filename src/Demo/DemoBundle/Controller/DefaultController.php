<?php

namespace Demo\DemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('DemoBundle:Default:index.html.twig', array('name' => $name));
    }

    public function bonjourAction() {
        return $this->render('DemoBundle:Default:bonjour.html.twig');
    }
}
