<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class IndexController extends Controller
{
    public function indexAction()
    {

    	$eventArray = $this->getDoctrine()
		    ->getRepository('AppBundle:Event')
		    ->findAll();

        return $this->render('index.html.twig', array(
        	'events' => $eventArray,
        ));
    }
}
