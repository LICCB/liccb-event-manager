<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class EventController extends Controller
{
    public function showAction($id)
    {
    	$event = $this->getDoctrine()
		    ->getRepository('AppBundle:Event')
		    ->find($id1);

        return $this->render('event/show.html.twig', array(
        'event' => $event
        ));
    }
}
