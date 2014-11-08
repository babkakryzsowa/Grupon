<?php

namespace Grupon\ContactBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('GruponContactBundle:Default:index.html.twig', array());
    }
    public function contactAction(Request $request)
    {
    	$form = $this->createForm(new ContactType());
    
    	if ($request->isMethod('POST')) {
    		$form->bind($request);
    
    		if ($form->isValid()) {
    			$message = \Swift_Message::newInstance()
    			->setSubject($form->get('subject')->getData())
    			->setFrom($form->get('email')->getData())
    			->setTo('contact@example.com')
    			->setBody(
    					$this->renderView(
    							'ContactBundle:Contact:contact.html.twig',
    							array(
    									'ip' => $request->getClientIp(),
    									'name' => $form->get('name')->getData(),
    									'message' => $form->get('message')->getData()
    							)
    					)
    			);
    
    			$this->get('mailer')->send($message);
    
    			$request->getSession()->getFlashBag()->add('success', 'Your email has been sent! Thanks!');
    
    			return $this->redirect($this->generateUrl('contact'));
    		}
    	}
    
    	return array(
    			'form' => $form->createView()
    	);
    }
}