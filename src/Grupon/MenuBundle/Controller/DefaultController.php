<?php

namespace Grupon\MenuBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('GruponMenuBundle:Default:index.html.twig', array());
    }
    public function testAction()
    {
    	return $this->render('GruponMenuBundle:Default:test.html.twig', array());
    }
}
