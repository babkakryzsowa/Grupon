<?php

namespace Grupon\MessageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('GruponMessageBundle:Default:index.html.twig', array('name' => $name));
    }
}
