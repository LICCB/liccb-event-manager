<?php

namespace AppBundle\Controller;

use AppBundle\Form\EventEdit;
use AppBundle\Form\EventRegistrantsEdit;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

$testStrategy1 = array(
	//Weight
	"over18" => True,
	"over18W" => -1,
	"swimExperience" => True,
	"swimExperienceW" => -1,
	"boatExperience" => True,
	"boatExperienceW" => 5,
	"CPR" => True,
	"CPRW" => 0,
	"participantType" => "volunteer",
	"participantTypeW" => 10
	);

function apply_strategy($answers, $strategy) {
	$reference = array(
		"over18W" => "over18",
		"swimExperienceW" => "swimExperience",
		"boatExperienceW" => "boatExperience",
		"CPRW" => "CPR",
		"participantTypeW" => "participantType"
	);
	
		
	$mandatoryWeights = array_keys($strategy, -1);
	$score = 0;
		
	foreach ($answers as $key => $value) {
		echo "value: ".$value."\n";
		echo "stratval: ".$strategy[$key]."\n";
		if ($value == $strategy[$key])
		{
			echo "weight: ".$strategy[$key."W"]."\n";
			if($strategy[$key."W"] != -1)
			{
				$score+= $strategy[$key."W"];
			}
		}	
	}
	foreach ($mandatoryWeights as $key) 
	{
		//echo $strategy[$reference[$key]];
		//echo $answers[$reference[$key]];
		if ($strategy[$reference[$key]] != $answers[$reference[$key]]) 
		{
			$score = 0;
		}
		}
	return $score;
}

$tempScoreArray = array();


				
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

		    foreach($event->getParties() as $party){
				
				//Putting scoring here for now, should probably move it to a separate scoreAction function to apply to a new button on page
				$registrant = $party->getRegistrant();
				$answers = array(
				"over18" => $registrant->getOver18(),
				"swimExperience" => $registrant->getHasSwimExperience(),
				"boatExperience" => $registrant->getHasBoatExperience(),
				"CPR" => $registrant->getHasCprCertification(), 
				"participantType" => $registrant->getParticipantType()
				);
				
				$score = apply_strategy($answers, $testStrategy1);
				$email = $registrant->getRegistrantEmail();
				$tempScoreArray[$email] = $score;
				
				
			    if($party->getSelectionStatus() == null){
			    	$party->setSelectionStatus("Emailed"); // Temporary hack
			    } elseif($form->get('update_and_email')->isClicked() && $party->getSelectionStatus() == "Approved") {
			    	// Send email
				    $message = \Swift_Message::newInstance()
					    ->setSubject("LICBoathouse Event Approval")
					    ->setFrom('test@test.com')
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
			'scores' => global $tempScoreArray,
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
