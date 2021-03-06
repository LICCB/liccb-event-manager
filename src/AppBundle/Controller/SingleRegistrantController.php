<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use Symfony\Component\HttpFoundation\Request;

class SingleRegistrantController extends Controller
{
    public function registrantAction(Request $request, $id)
    {
		
    	$registrant = $this->getDoctrine()
		    ->getRepository('AppBundle:Registrant')
		    ->find($id);
		
		if (!$registrant) {
				throw $this->createNotFoundException(
					'No user found for id'.$id);
		}
		
		$form = $this->createFormBuilder($registrant)
			->add('comments', TextareaType::class, array(
				'label' => 'Comments',
				'required' => false,
				'attr' => array('cols' => '70', 'rows' => '5')))
			->add('search', SubmitType::class, array(
				'label' => 'Update comments'))
			->getForm();

		$form->handleRequest($request);

		if ($form->isSubmitted() && $form->isValid()) {
			$comments = $form->getData()->getComments();
			$registrant->setComments($comments);

			$em = $this->getDoctrine()->getManager();
	    	$em->persist($registrant);
	    	$em->flush();
		}

        return $this->render('single_registrant.html.twig',array(
			'form' => $form->createView(),
			'registrant' => $registrant,
			));
    }
}
