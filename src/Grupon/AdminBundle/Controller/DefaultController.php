<?php

namespace Grupon\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function adminAction()
    {
        return $this->render('GruponAdminBundle:Default:admin.html.twig', array());
    }
   
}
