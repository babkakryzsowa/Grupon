<?php

namespace Grupon\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('GruponUserBundle:Default:index.html.twig', array());
    }
}
