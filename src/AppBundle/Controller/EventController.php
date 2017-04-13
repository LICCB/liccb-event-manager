<?php

namespace AppBundle\Controller;

use AppBundle\Form\EventEdit;
use AppBundle\Form\EventRegistrantsEdit;
use AppBundle\Form\EventScoring;
use AppBundle\Form\EventStrategies;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

function apply_strategy($answers, $strategy) {
		$reference = array(
			"over18W" => "over18",
			"swimExperienceW" => "swimExperience",
			"boatExperienceW" => "boatExperience",
			"cprW" => "cpr",
			"participantTypeW" => "participantType"
		);
		
		$mandatoryWeights = array_keys($strategy, -1);
		$score = 0;
		
		foreach ($answers as $key => $value) {
			//echo "value: ".$value."\n";
			//echo "stratval: ".$strategy[$key]."\n";
			if ($value == $strategy[$key])
			{
				//echo "weight: ".$strategy[$key."W"]."\n";
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
		//echo $score;
		return $score;
	}
	
class EventController extends Controller
{

    public function showAction(Request $request, $id)
    {
    	$event = $this->getDoctrine()
		    ->getRepository('AppBundle:Org_event')
		    ->find($id);
			
		$strategies = $this->getDoctrine()
			->getRepository('AppBundle:Strategy')
			->findAll();
			
    	$registrantsForm = $this->createForm(EventRegistrantsEdit::class, $event);
	    $registrantsForm->handleRequest($request);
		
		$score_form = $this->createForm(EventScoring::class, $event, array(
			'action' => $this->generateUrl('event_score', array('id' => $id,)),
			'method' => 'POST',
		));
	    $score_form->handleRequest($request);
		
		$strategy_form = $this->createForm(EventStrategies::class, array(
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
			'score_form' => $score_form->createView(),
			'strategy_form' => $strategy_form->createView(),
			'strategies' => $strategies
        ));
		
    }

	public function scoreAction(Request $request, $id)
	{
		$logger = $this->get('logger');
		$logger->info('test');
				
		$event = $this->getDoctrine()
			->getRepository('AppBundle:Org_event')
			->find($id);
			
		$registrantsForm = $this->createForm(EventRegistrantsEdit::class, $event);
	    $registrantsForm->handleRequest($request);
		
		$strategies = $this->getDoctrine()
			->getRepository('AppBundle:Strategy')
			->findAll();
				
		$the_strategy = $this->getDoctrine()
			->getRepository('AppBundle:Strategy')
			-find($strategy_id);

    	$score_form = $this->createForm(EventScoring::class, $event, array(
			'action' => $this->generateUrl('event_score', array('id' => $id,)),
			'method' => 'POST',
		));
	    $score_form->handleRequest($request);
		
		$strategy_form = $this->createForm(EventStrategies::class, array(
			'action' => $this->generateUrl('event_strategy', array('id' =>$id,)),
			'method' => 'POST',
		));
		$strategy_form->handleRequest($request);
		
		if($score_form->isSubmitted() && $score_form->isValid())
		{
	    	$event = $registrantsForm->getData();
			$data = $score_form->getData();
			$strategy = $data['strategies'];
			
			$strategy.setName(data['name']);
			
			$strategy.setOver18(data['over18']);
			$strategy.setOver18W(data['over18W']);
			if (data['over18Required'])
				$strategy.setOver18W(-1);
			//$strategy.setOver18Required(data['over18Required']);
			
			$strategy.setOver18(data['swimExpereince']);
			$strategy.setOver18W(data['swimExpereinceW']);
			//$strategy.setOver18Required(data['swimExpereinceRequired']);
			
			$strategy.setOver18(data['boatExperience']);
			$strategy.setOver18W(data['boatExperienceW']);
			//$strategy.setOver18Required(data['boatExperienceRequired']);
			
			$strategy.setOver18(data['Cpr']);
			$strategy.setOver18W(data['CprW']);
			//$strategy.setOver18Required(data['CprRequired']);
			
			$strategy.setOver18(data['participantType']);
			$strategy.setOver18W(data['participantTypeW']);
			//$strategy.setOver18Required(data['participantTypeRequired']);
			
			if ($score_form->get('score')->isClicked()) 
			{
				
		
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
					$testStrategy1 = array(
						//Weight
						"id" => 1,
						"name" => "Test Strategy 1",
						"over18" => True,
						"over18W" => -1,
						"swimExperience" => True,
						"swimExperienceW" => -1,
						"boatExperience" => True,
						"boatExperienceW" => 5,
						"cpr" => True,
						"cprW" => 0,
						"participantType" => "volunteer",
						"participantTypeW" => 10
					);
					$score = apply_strategy($answers, $testStrategy1);	
					$logger->info('Blah');
					$logger->info($score);
					$party->setSelectionScore($score);	
				}
			}

	    	$em = $this->getDoctrine()->getManager();
	    	$em->persist($event);
			$em->persist($strategy);
	    	$em->flush();			
		
			return $this->redirectToRoute('event_show', array(
				'id' => $id
			));
		}
		
		return $this->render('event/show.html.twig', array(
			'event' => $event,
			'form' => $registrantsForm->createView(),
			'score_form' => $score_form->createView(),
			'strategy_form' => $strategy_form->createView(),
			'strategies' => $strategies
        ));
		
	}
			
	public function strategyAction(Request $request, $id, $strategyId) {
			
		$event = $this->getDoctrine()
			->getRepository('AppBundle:Org_event')
			->find($id);
			
		$strategies = $this->getDoctrine()
			->getRepository('AppBundle:Strategy')
			->findAll();	
			
		$registrantsForm = $this->createForm(EventRegistrantsEdit::class, $event);
	    $registrantsForm->handleRequest($request);

    	$score_form = $this->createForm(EventScoring::class, $event, array(
			'action' => $this->generateUrl('event_score', array('id' => $id,)),
			'method' => 'POST',
		));
	    $score_form->handleRequest($request);
		
		$strategy_form = $this->createForm(EventStrategies::class, $event, array(
			'action' => $this->generateUrl('event_strategy', array('id' =>$id,)),
			'method' => 'POST',
		));
		$strategy_form->handleRequest($request);
		
		if($strategy_form->isSubmitted() && $strategy_form->isValid())
		{
			$strategy = $strategy_form->getData();
		}
		
		return $this->render('event/show.html.twig', array(
			'event' => $event,
			'form' => $registrantsForm->createView(),
			'score_form' => $score_form->createView(),
			'strategy_form' => $strategy_form->createView()
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
