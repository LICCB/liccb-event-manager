<?php

namespace AppBundle\Controller;

use AppBundle\Form\EventEdit;
use AppBundle\Form\EventRegistrantsEdit;
use AppBundle\Form\EventScoring;
use AppBundle\Form\EventStrategies;
use AppBundle\Form\EventAttendanceEdit;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Strategy;
use Symfony\Component\Form\FormError;

// Global Function Called to apply strategy to a given registrants answers
function apply_strategy($answers, $strategy) {
		// An array used to associate weight values with the answer provided by registrants
		$reference = array(
			"over18W" => "over18",
			"swimExperienceW" => "swimExperience",
			"boatExperienceW" => "boatExperience",
			"cprW" => "cpr",
			"participantTypeW" => "participantType",
			"attendanceW" => "attendance"
		);

		$score = 0;
		// $weightSum = 0; // Was using this value for normalization but it didn't work

		// Loop through answers provided by registrant
		foreach ($answers as $key => $value) {
			// if their answer value matches the expected value given by the strategy
			if ($value >= $strategy[$key])
			{
				// If the weight of that answer is not set to -1 (-1 indicates mandatory in this algorithm)
				if($strategy[$key."W"] != -1)
				{
					// Add the weight of the given question to the registrants current score
					$score+= $strategy[$key."W"];
				}
				// $weightSum += $strategy[$key."W"];
			} else { // their answer value does not match the expected value
				// If the weight IS set to -1, it's mandatory
				if ($strategy[$key."W"] == -1)
				{
					$score = 0; // this registrant is not elligible to participate, according to this strategy
					break;
				}	
			}
		}		
		return $score;
	}

class EventController extends Controller
{
	
	// Function called when event page is loaded and when selection statuses are updated
    public function showAction(Request $request, $id)
    {
		// Get the event associated with $id
    	$event = $this->getDoctrine()
		    ->getRepository('AppBundle:Org_event')
		    ->find($id);
			
		// Get the first strategy in the database, couldn't find a clean way save the last strategy used
		$selected_strategy = $this->getDoctrine()
			->getRepository('AppBundle:Strategy')
			->findOneBy(array());	
			
		// Get all of the strategies - used to pass data to javascript when the page is rendered
		$all_strategies = $this->getDoctrine()
			->getRepository('AppBundle:Strategy')
			->findAll();
			
		// collect all data from the first strategy into an array
		$data = array();
		if ($selected_strategy != NULL) {
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
			if ($data['participantTypeW'] == -1) {
				$data['participantTypeRequired'] = true;
			}
			
			$data['attendance'] = $selected_strategy->getAttendance();
			$data['attendanceW'] = $selected_strategy->getAttendanceW();
			if ($data['attendanceW'] == -1) {
				$data['attendanceRequired'] = true;
			}
		}

		
		// Create registrant selection form
    	$registrantsForm = $this->createForm(EventRegistrantsEdit::class, $event);
	    $registrantsForm->handleRequest($request);
		
		// Create the strategy form, passes $data to the form to prepopulate fields with the first strategy
		$strategy_form = $this->createForm(EventStrategies::class, $data, array(
			'action' => $this->generateUrl('event_strategy', array('id' =>$id,)),
			'method' => 'POST',
		));
		
		$strategy_form->handleRequest($request);

		// create the attendance form
		$attendanceForm = $this->createForm(EventAttendanceEdit::class, $event);
	    $attendanceForm->handleRequest($request);

		// On Submission of registrants form - if data is valid
	    if($registrantsForm->isSubmitted() && $registrantsForm->isValid()){
	    	$event = $registrantsForm->getData();

			// Loop through all parties in event
		    foreach($event->getParties() as $party){
				
				// If party does not have a selection status, give them status emailed - not sure why jake did this
			    if($party->getSelectionStatus() == null){
			    	$party->setSelectionStatus("Emailed");
			    } elseif($registrantsForm->get('update_and_email')->isClicked() && $party->getSelectionStatus() == "Approved") {
			    	
					// Send approval email to registrant if they are 'Approved'
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
			    	
					// Send decline email to registrant if they are 'Denied'
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

			// Finalizes changes to database
	    	$em = $this->getDoctrine()->getManager();
	    	$em->persist($event);
	    	$em->flush();

	    	return $this->redirectToRoute('event_show', array(
	    		'id' => $id
		    ));
	    }

		if($attendanceForm->isSubmitted() && $attendanceForm->isValid()){
	    	$formEvents = $attendanceForm->getData();

			foreach($event->getParties() as $party) {
				foreach($formEvents->getParties() as $formParty) {
					if ($formParty->getId() == $party->getId()) {
						$party->setNumActuallyAttended($formParty->getNumActuallyAttended());
						$party->setThumbs($formParty->getThumbs());
						break;
					}
				}
			}

	    	$em = $this->getDoctrine()->getManager();
	    	$em->persist($event);
	    	$em->flush();

	    	return $this->redirectToRoute('event_show', array(
	    		'id' => $id
		    ));
	    }
		
		// Pass all necessary values to page and render
        return $this->render('event/show.html.twig', array(
	        'event' => $event,
	        'form' => $registrantsForm->createView(),
			'strategy_form' => $strategy_form->createView(),
			'all_strategies' => $all_strategies,
			'attendance_form' => $attendanceForm->createView(),
        ));
		
    }
	
	// Function called when the strategy_form is submitted, handles (create, update, delete, and apply) strategy actions
	public function strategyAction(Request $request, $id) {
		$logger = $this->get('logger');
		
		// Get the event associated with $id
		$event = $this->getDoctrine()
			->getRepository('AppBundle:Org_event')
			->find($id);
			
		// Get the first strategy in the database, couldn't find a clean way save the last strategy used
		$selected_strategy = $this->getDoctrine()
			->getRepository('AppBundle:Strategy')
			->findOneBy(array());			
			
		// Get all of the strategies - used to pass data to javascript when the page is rendered
		$all_strategies = $this->getDoctrine()
			->getRepository('AppBundle:Strategy')
			->findAll();
			
		// collect all data from the first strategy into an array
		$data = array();
		if ($selected_strategy != NULL) {
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
			
			$data['attendance'] = $selected_strategy->getAttendance();
			$data['attendanceW'] = $selected_strategy->getAttendanceW();
			if ($data['attendanceW'] == -1)
				$data['attendanceRequired'] = true;
		}
		
		
			
			
		// create the registrants form
		$registrantsForm = $this->createForm(EventRegistrantsEdit::class, $event);
	    $registrantsForm->handleRequest($request);
				
		// create the strategy form
		$strategy_form = $this->createForm(EventStrategies::class, $data);
		$strategy_form->handleRequest($request);

		// create the attendance form
		$attendanceForm = $this->createForm(EventAttendanceEdit::class, $event);
	    $attendanceForm->handleRequest($request);
		
		
		// Retrieve the form's buttons
		$apply_button = $strategy_form->get('applyStrategy');
		$update_button = $strategy_form->get('updateStrategy');
		$new_button = $strategy_form->get('newStrategy');
		$delete_button = $strategy_form->get('deleteStrategy');
		
		$strategy_updated = false;
		$is_new_strategy = false;
		$is_deleted = false;

		// Check form is submitted
		if($strategy_form->isSubmitted() && $strategy_form->isValid())
		{
			$data = $strategy_form->getData();
			
			$strategy;
			$new_strategy;
			
			// If apply is clicked, update all party scores according to the strategy selected
			if ($apply_button->isClicked()) {
				
				$strategy = $data["strategies"];
				
				foreach($event->getParties() as $party)
				{
					// put all relevant registrant answers into an arrray
					$registrant = $party->getRegistrant();
					if ($registrant->getNumTimesInvited() == 0) {
						$my_attendance = 0;
					} else {
						$my_attendance = $registrant->getNumTimesAttended() / $registrant->getNumTimesInvited() * 100;
					}
					$answers = array(
						"over18" => $registrant->getOver18(),
						"swimExperience" => $registrant->getHasSwimExperience(),
						"boatExperience" => $registrant->getHasBoatExperience(),
						"cpr" => $registrant->getHasCprCertification(), 
						"participantType" => $registrant->getParticipantType(),
						"attendance" => $my_attendance
					);
					// A simple array to make it easier to apply the strategy, 
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
						"attendance" => $strategy->getAttendance(),
						"attendanceW" => $strategy->getAttendanceW()
					);
					
					// calculate the score for the current party/registrant
					$score = apply_strategy($answers, $ChosenStrategy);	
					//$logger->info('Blah');
					$logger->info($score);
					// Update the partyies score 
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
					
					$strategy->setAttendance($data["attendance"]);
					$strategy->setAttendanceW($data["attendanceW"]);
					if ($data["attendanceRequired"] == true)
						$strategy->setAttendanceW(-1);
					
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
				
				$new_strategy->setAttendance($data["attendance"]);
				$new_strategy->setAttendanceW($data["attendanceW"]);
				if ($data["attendanceRequired"] == true)
					$new_strategy->setAttendanceW(-1);
			}			
			// If delete is clicked, delete the selected strategy.
			if($delete_button->isClicked()) {
				$strategy = $data['strategies'];
				$is_deleted = true;
		
			}			
		}
		
		// Flush necessary changes to the database
		$em = $this->getDoctrine()->getManager();
		if ($strategy_updated)
			$em->persist($strategy);
		if ($is_new_strategy)
			$em->persist($new_strategy);
		if ($is_deleted)
			$em->remove($strategy);
		$em->persist($event);
		$em->flush();	
		
		// Pass all necessary values to page and render
		return $this->render('event/show.html.twig', array(
			'event' => $event,
			'form' => $registrantsForm->createView(),
			'strategy_form' => $strategy_form->createView(),
			'all_strategies' => $all_strategies,
			'attendance_form' => $attendanceForm->createView(),
        ));
	}
	
	// displays edit page and updates any changes made to the event details in the form upon clicking save
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
