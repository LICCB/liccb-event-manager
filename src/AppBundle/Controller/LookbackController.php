<?php

namespace AppBundle\Controller;

use AppBundle\Form\EventRegistrantsEdit;

use Symfony\Component\HttpFoundation\Response; /* remove when I update to template */

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

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

		$em = $this->getDoctrine()->getManager();

		$registrant = new Registrant();
		$form = $this->createFormBuilder($participant)
			->add('fullName', TextType::class)
			->add('search', SubmitType::class, array('label' => 'Search'))
			->getForm();

		$form->handleRequest($request);

		if ($form->isSubmitted() && $form->isValid()) {
			$registrant_name = $form->getData()->getFullName();

			$registrantRepository = $this
				->getDoctrine()
				->getRepository('AppBundle:Registrant');

			/*$participantRepository = $this
				->getDoctrine()
				->getRepository('AppBundle:Participant');*/


			$query = $registrantRepository->createQueryBuilder('p')
						->where('LOWER(p.fullName) LIKE LOWER(:name)')
						->setParameter('name', '%'.$registrant_name.'%')
						->getQuery();

			$registrants = $query->getResult();

			return new Response(
				'<html></body>
					<p>email: '.$registrants[0]->getRegistrantEmail().'</p>
					<p>event name: '.$registrants[0]->getParties()[0]->getOrgEvent()->getOrgEventName().'</p>
				</body></html>'
			);

			/*return $this->render('lookback/search_results.html.twig', array(
				'form' => $form->createView(),
			));*/
		} else {
			return $this->render('lookback/search_results.html.twig', array(
				'form' => $form->createView(),
			));
		}

		

		

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
