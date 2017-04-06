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
		$em = $this->getDoctrine()->getManager();

		$registrant = new Registrant();
		$form = $this->createFormBuilder($registrant)
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

			/*return new Response(
				'<html></body>
					<p>email: '.$registrants[0]->getRegistrantEmail().'</p>
					<p>event name: '.$registrants[0]->getParties()[0]->getOrgEvent()->getOrgEventName().'</p>
				</body></html>'
			);*/

			return $this->render('lookback_search_results.html.twig', array(
				'registrants' => $registrants,
			));
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
