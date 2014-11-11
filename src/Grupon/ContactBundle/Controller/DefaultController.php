<?php

namespace Grupon\ContactBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Grupon\ContactBundle\Form\ContactType;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('GruponContactBundle:Default:index.html.twig', array());
    }

    
    public function contactAction()
    {
        $request = $this->getRequest();
        
        $form = $this->createForm(new ContactType() );
        
        $form->handleRequest($request);
        if ($form->isValid()) {
            $data = $form->getData();
            
            // name - $data['name']
            
            $message = \Swift_Message::newInstance()
                    ->setSubject('Wiadomość z serwisu ShopApp')
                    ->setFrom('kasia55424@poczta.fm')
                    ->setBody(
                            $this->renderView('GruponContactBundle:Default:email.html.twig', [
                                'name' => $data['name'],
                                'message' => $data['message'],
                            ]), 'text/html');
            if($request->isXmlHttpRequest()) {
            	return new JsonResponse([
            		'succes' => true,
            		'message' => 'Formularz pomyslnie wyslany'		
            	]);
            }
            
            
            if ($this->get('mailer')->send($message)) {
                $this->get('session')->getFlashBag()->add('success', 'Wiadomość została wysłana');
            } else {
                $this->get('session')->getFlashBag()->add('error', 'Błąd wysyłki');
            }
            
            return $this->redirect($this->generateUrl('contact'));            
        }
        
        return $this->render('GruponContactBundle:Default:contact.html.twig', [
           'form' => $form->createView(), 
        ]);
    }
}