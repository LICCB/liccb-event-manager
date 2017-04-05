<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class RegistrantManagementController extends Controller
{
    public function registrantsAction()
    {
		
    	$registrants = $this->getDoctrine()
		    ->getRepository('AppBundle:Registrant')
		    ->findAll();
		
        return $this->render('registrant_management.html.twig',array('registrants' => $registrants,));
    }
}
