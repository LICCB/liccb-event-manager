<?php

namespace AppBundle\Controller;

use AppBundle\Form\EventEdit;
use AppBundle\Form\EventRegistrantsEdit;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class EventController extends Controller
{
    public function showAction(Request $request, $id)
    {
    	$event = $this->getDoctrine()
		    ->getRepository('AppBundle:Org_event')
		    ->find($id);

    	$form = $this->createForm(EventRegistrantsEdit::class, $event);
	    $form->handleRequest($request);

	    if($form->isSubmitted() && $form->isValid()){
	    	$event = $form->getData();

		    if($form->get('update_and_email')->isClicked()){
			    $parties = $event->getParties();
			    foreach ($event->getParties() as &$party){
			    	if($party->getSelectionStatus() == "Approved"){
			    		// Email them
			    		$party->setSelectionStatus("Emailed");
			    		$logger = $this->get('logger');
			    		$logger->info("Sent email");
				    }
			    }
		    }


	    	$em = $this->getDoctrine()->getManager();
	    	$em->persist($event);
	    	$em->flush();

	    	return $this->redirectToRoute('event_show', array(
	    		'id' => $id,
		    ));
	    }

        return $this->render('event/show.html.twig', array(
	        'event' => $event,
	        'form' => $form->createView(),
        ));
    }

    public function editAction(Request $request, $id){
    	$event = $this->getDoctrine()
		    ->getRepository('AppBundle:Org_event')
		    ->find($id);

    	$form = $this->createForm(EventEdit::class, $event);

    	$form->handleRequest($request);

    	if($form->isSubmitted() && $form->isValid()){
    		$event = $form->getData();

    		$em = $this->getDoctrine()->getManager();
    		$em->persist($event);
    		$em->flush();

    		return $this->redirectToRoute('event_show',array(
    			'id' => $id
		    ));
	    }

	    return $this->render('event/edit.html.twig', array(
	    	'form' => $form->createView(),
	    ));
    }
}
