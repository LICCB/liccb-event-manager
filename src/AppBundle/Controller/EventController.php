<?php

namespace AppBundle\Controller;

use AppBundle\Form\EventEdit;
use AppBundle\Form\EventRegistrantsEdit;
use AppBundle\Form\EventScoring;
use AppBundle\Form\EventStrategies;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Strategy;
use Symfony\Component\Form\FormError;

function apply_strategy($answers, $strategy) {
		$reference = array(
			"over18W" => "over18",
			"swimExperienceW" => "swimExperience",
			"boatExperienceW" => "boatExperience",
			"cprW" => "cpr",
			"participantTypeW" => "participantType"
		);

		$score = 0;
		$weightSum = 0;

		
		foreach ($answers as $key => $value) {
			if ($value == $strategy[$key])
			{
				if($strategy[$key."W"] != -1)
				{
					$score+= $strategy[$key."W"];
				}
				$weightSum += $strategy[$key."W"];
			} else {
				if ($strategy[$key."W"] == -1)
				{
					$score = 0;
					break;
				}	
			}
		}
		
		return $score;
	}

class EventController extends Controller
{
	
	// Function called when event page is loaded.  This also handles the action of 
    public function showAction(Request $request, $id)
    {
    	$event = $this->getDoctrine()
		    ->getRepository('AppBundle:Org_event')
		    ->find($id);
			
		$selected_strategy = $this->getDoctrine()
			->getRepository('AppBundle:Strategy')
			->findOneBy(array());	
			
		$all_strategies = $this->getDoctrine()
			->getRepository('AppBundle:Strategy')
			->findAll();
			
		// array to hold prepopulated form data
		$data = array();
		$data['name'] = $selected_strategy->getName();
		$data['over18'] = $selected_strategy->getOver18();
		$data['over18W'] = $selected_strategy->getOver18W();
		if ($data['over18W'] == -1)
			$data['over18Required'] = true;
		
		$data['swimExperience'] = $selected_strategy->getSwimExperience();
		$data['swimExperienceW'] = $selected_strategy->getSwimExperienceW();
		if ($data['swimExperienceW'] == -1)
			$data['swimExperienceRequired'] = true;
		
		$data['boatExperience'] = $selected_strategy->getBoatExperience();
		$data['boatExperienceW'] = $selected_strategy->getBoatExperienceW();
		if ($data['boatExperienceW'] == -1)
			$data['boatExperienceRequired'] = true;
		
		$data['Cpr'] = $selected_strategy->getCpr();
		$data['CprW'] = $selected_strategy->getCprW();
		if ($data['CprW'] == -1)
			$data['CprRequired'] = true;
		
		$data['participantType'] = $selected_strategy->getParticipantType();
		$data['participantTypeW'] = $selected_strategy->getParticipantTypeW();
		if ($data['participantTypeW'] == -1)
			$data['participantTypeRequired'] = true;
			
    	$registrantsForm = $this->createForm(EventRegistrantsEdit::class, $event);
	    $registrantsForm->handleRequest($request);
		
		$strategy_form = $this->createForm(EventStrategies::class, $data, array(
			'action' => $this->generateUrl('event_strategy', array('id' =>$id,)),
			'method' => 'POST',
		));
		
		$strategy_form->handleRequest($request);

	    if($registrantsForm->isSubmitted() && $registrantsForm->isValid()){
	    	$event = $registrantsForm->getData();

		    foreach($event->getParties() as $party){
				
			    if($party->getSelectionStatus() == null){
			    	$party->setSelectionStatus("Emailed"); // Temporary hack
			    } elseif($registrantsForm->get('update_and_email')->isClicked() && $party->getSelectionStatus() == "Approved") {
			    	// Send email
				    $message = \Swift_Message::newInstance()
					    ->setSubject("LICBoathouse Event Approval")
					    ->setFrom('event_updates@licboathouse.org')
					    ->setTo($party->getRegistrantEmail())
					    ->setBody(
					    	$this->renderView('email/approved.html.twig', array(
					    		'name' => $party->getRegistrant()->getFullName(),
							    'event' => $event,
						    )),
						    'text/html'
					    )
					    ;
				    $this->get('mailer')->send($message);
			    	$party->setSelectionStatus("Emailed");
			    } elseif($registrantsForm->get('update_and_email')->isClicked() && $party->getSelectionStatus() == "Denied") {
			    	// Send email
				    $message = \Swift_Message::newInstance()
					    ->setSubject("LICBoathouse Event Decline")
					    ->setFrom('event_updates@licboathouse.org')
					    ->setTo($party->getRegistrantEmail())
					    ->setBody(
					    	$this->renderView('email/declined.html.twig', array(
					    		'name' => $party->getRegistrant()->getFullName(),
							    'event' => $event,
						    )),
						    'text/html'
					    )
					    ;
				    $this->get('mailer')->send($message);
			    	$party->setSelectionStatus("Emailed");
			    }
			}

	    	$em = $this->getDoctrine()->getManager();
	    	$em->persist($event);
	    	$em->flush();

	    	return $this->redirectToRoute('event_show', array(
	    		'id' => $id
		    ));
	    }
		
        return $this->render('event/show.html.twig', array(
	        'event' => $event,
	        'form' => $registrantsForm->createView(),
			'strategy_form' => $strategy_form->createView(),
			'all_strategies' => $all_strategies,
        ));
		
    }

	public function strategyAction(Request $request, $id) {
		$logger = $this->get('logger');
		
		// grab event from DB
		$event = $this->getDoctrine()
			->getRepository('AppBundle:Org_event')
			->find($id);
			
		$selected_strategy = $this->getDoctrine()
			->getRepository('AppBundle:Strategy')
			->findOneBy(array());			
			
		$all_strategies = $this->getDoctrine()
			->getRepository('AppBundle:Strategy')
			->findAll();
			
		// array to hold prepopulated form data
		$data = array();
		
		$data['name'] = $selected_strategy->getName();
		$data['over18'] = $selected_strategy->getOver18();
		$data['over18W'] = $selected_strategy->getOver18W();
		if ($data['over18W'] == -1)
			$data['over18Required'] = true;
		
		$data['swimExperience'] = $selected_strategy->getSwimExperience();
		$data['swimExperienceW'] = $selected_strategy->getSwimExperienceW();
		if ($data['swimExperienceW'] == -1)
			$data['swimExperienceRequired'] = true;
		
		$data['boatExperience'] = $selected_strategy->getBoatExperience();
		$data['boatExperienceW'] = $selected_strategy->getBoatExperienceW();
		if ($data['boatExperienceW'] == -1)
			$data['boatExperienceRequired'] = true;
		
		$data['Cpr'] = $selected_strategy->getCpr();
		$data['CprW'] = $selected_strategy->getCprW();
		if ($data['CprW'] == -1)
			$data['CprRequired'] = true;
		
		$data['participantType'] = $selected_strategy->getParticipantType();
		$data['participantTypeW'] = $selected_strategy->getParticipantTypeW();
		if ($data['participantTypeW'] == -1)
			$data['participantTypeRequired'] = true;
		
			
			
		// create the registrants form
		$registrantsForm = $this->createForm(EventRegistrantsEdit::class, $event);
	    $registrantsForm->handleRequest($request);
				
		// create the strategy form
		$strategy_form = $this->createForm(EventStrategies::class, $data);
		$strategy_form->handleRequest($request);
		
		
		// Retrieve the form's buttons
		$apply_button = $strategy_form->get('applyStrategy');
		$update_button = $strategy_form->get('updateStrategy');
		$new_button = $strategy_form->get('newStrategy');
		$delete_button = $strategy_form->get('deleteStrategy');
		
		// Check form is submitted
		if($strategy_form->isSubmitted() && $strategy_form->isValid())
		{
			$data = $strategy_form->getData();
			
			$strategy;
			$strategy_updated = false;
			$new_strategy;
			$is_new_strategy = false;
			$is_deleted = false;
			
			// If apply is clicked, update all party scores
			if ($apply_button->isClicked()) {
				
				$strategy = $data["strategies"];
				
				foreach($event->getParties() as $party)
				{
					$registrant = $party->getRegistrant();
						$answers = array(
							"over18" => $registrant->getOver18(),
							"swimExperience" => $registrant->getHasSwimExperience(),
							"boatExperience" => $registrant->getHasBoatExperience(),
							"cpr" => $registrant->getHasCprCertification(), 
							"participantType" => $registrant->getParticipantType()
					);
					/* This is a dummy strategy */
					$ChosenStrategy = array(
						"name" => $strategy->getName(),
						"over18" => $strategy->getOver18(),
						"over18W" =>  $strategy->getOver18W(),
						"swimExperience" =>  $strategy->getSwimExperience(),
						"swimExperienceW" =>  $strategy->getSwimExperienceW(),
						"boatExperience" =>  $strategy->getBoatExperience(),
						"boatExperienceW" =>  $strategy->getBoatExperienceW(),
						"cpr" =>  $strategy->getCpr(),
						"cprW" =>  $strategy->getCprW(),
						"participantType" =>  $strategy->getParticipantType(),
						"participantTypeW" =>  $strategy->getParticipantTypeW(),
					);
					

					$score = apply_strategy($answers, $ChosenStrategy);	
					//$logger->info('Blah');
					$logger->info($score);
					$party->setSelectionScore($score);	
				}
			}
			// If update is clicked, update the current strategy using the form
			if($update_button->isClicked()) {
				$strategy_updated = true;
				$strategy = $data["strategies"];
				
				if ($strategy_updated)
				{
					// Store all form data in selected strategy'
					$strategy->setName($data["name"]);
					$strategy->setOver18($data["over18"]);
					$strategy->setOver18W($data["over18W"]);
					if ($data["over18Required"] == true)
						$strategy->setOver18W(-1);
					
					$strategy->setSwimExperience($data["swimExperience"]);
					$strategy->setSwimExperienceW($data["swimExperienceW"]);
					if ($data["swimExperienceRequired"] == true)
						$strategy->setSwimExperienceW(-1);
					
					$strategy->setBoatExperience($data["boatExperience"]);
					$strategy->setBoatExperienceW($data["boatExperienceW"]);
					if ($data["boatExperienceRequired"] == true)
						$strategy->setBoatExperienceW(-1);
					
					$strategy->setCpr($data["Cpr"]);
					$strategy->setCprW($data["CprW"]);
					if ($data["CprRequired"] == true)
						$strategy->setCprW(-1);
					
					$strategy->setParticipantType($data["participantType"]);
					$strategy->setParticipantTypeW($data["participantTypeW"]);
					if ($data["participantTypeRequired"] == true)
						$strategy->setParticipantTypeW(-1);
				}
				
			}
			// If new is clicked, create a new strategy with the given form data
			if($new_button->isClicked()) {
				$logger->info("new strategy button clicked");
				$is_new_strategy = true;
				$new_strategy = new Strategy();
								
				$nameError = new FormError("Strategy names must be unique");
								
				$new_strategy_check = $this->getDoctrine()
					->getRepository('AppBundle:Strategy')
					->find($data["name"]);
					
				if (sizeOf($new_strategy_check) != 0)
				{
					$strategy_form->get('name')->addError($nameError);
					$is_new_strategy = false;
				}
				
				// Store all form data in the new strategy'
				$new_strategy->setOwner("Temporary_Owner");
				$new_strategy->setName($data["name"]);
				$new_strategy->setOver18($data["over18"]);
				$new_strategy->setOver18W($data["over18W"]);
				if ($data["over18Required"] == true)
					$new_strategy->setOver18W(-1);
				
				$new_strategy->setSwimExperience($data["swimExperience"]);
				$new_strategy->setSwimExperienceW($data["swimExperienceW"]);
				if ($data["swimExperienceRequired"] == true)
					$new_strategy->setSwimExperienceW(-1);
				
				$new_strategy->setBoatExperience($data["boatExperience"]);
				$new_strategy->setBoatExperienceW($data["boatExperienceW"]);
				if ($data["boatExperienceRequired"] == true)
					$new_strategy->setBoatExperienceW(-1);
				
				$new_strategy->setCpr($data["Cpr"]);
				$new_strategy->setCprW($data["CprW"]);
				if ($data["CprRequired"] == true)
					$new_strategy->setCprW(-1);
				
				$new_strategy->setParticipantType($data["participantType"]);
				$new_strategy->setParticipantTypeW($data["participantTypeW"]);
				if ($data["participantTypeRequired"] == true)
					$new_strategy->setParticipantTypeW(-1);
			}			
			// If delete is clicked, delete the selected strategy.
			if($delete_button->isClicked()) {
				$strategy = $data['strategies'];
				$is_deleted = true;
		
			}			
		}
		
		// Flush changes to the database
		$em = $this->getDoctrine()->getManager();
		if ($strategy_updated)
			$em->persist($strategy);
		if ($is_new_strategy)
			$em->persist($new_strategy);
		if ($is_deleted)
			$em->remove($strategy);
		$em->persist($event);
		$em->flush();	
		
		return $this->render('event/show.html.twig', array(
			'event' => $event,
			'form' => $registrantsForm->createView(),
			'strategy_form' => $strategy_form->createView(),
			'all_strategies' => $all_strategies,
        ));
	}
	
    public function editAction(Request $request, $id)
	{   	
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
