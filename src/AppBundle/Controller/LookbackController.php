<?php

namespace AppBundle\Controller;

use AppBundle\Form\EventRegistrantsEdit;

use Symfony\Component\HttpFoundation\Response; /* remove when I update to template */

use AppBundle\Entity\Org_event;
use AppBundle\Entity\Registrant;
use AppBundle\Entity\Party;
use AppBundle\Entity\Participant;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class LookbackController extends Controller
{
    public function lookbackAction(Request $request)
    {
		/* currently testing with static page before using forms and templates */

		/*
		$event = new Org_event();
		$event->setOrgEventName("Row Across the Pacific");
		$event->setOrgEventType("boating");
		$event->setCapacity(10);
		$event->setDate(new \DateTime("2017-06-12"));
		$event->setSignupStart(new \DateTime("2017-03-01"));
		$event->setSignupEnd(new \DateTime("2017-04-15"));
		$event->setOrgEventDescription("[description] don't drown");
		
		$em = $this->getDoctrine()->getManager();
		$em->persist($event);
		$em->flush();
		*/

		$participant = new Participant();
		$form-> $this->createFormBuilder($participant)
			->add('nameSearch', TextType::class)
			->add('search', SubmitType::class, array('label' => 'Search'))
			->getForm();

		$form->handleRequest($request);

		if ($form->isSubmitted() && $form->isValid()) {
			$participant_name = $form->getData()->getFullName();

			$repository = $em->getRepository('AppBundle:Participant');
			$query = $repository->createQueryBuilder('p')
						->where('p.full_name LIKE :name')
						->setParameter('name', '%'.$participant_name.'%');

			$participants = $query->getResult();
		}

		return $this->render('lookback/search_results.html.twig',)

		

		/*
		$form = $this->createForm(EventRegistrantsEdit::class, $event);
	    $form->handleRequest($request);

        return $this->render('event/show.html.twig', array(
	        'event' => $event,
	        'form' => $form->createView(),
        ));
		*/
    }
}
