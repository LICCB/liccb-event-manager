<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SingleRegistrantController extends Controller
{
    public function registrantAction($id)
    {
		
    	$registrant = $this->getDoctrine()
		    ->getRepository('AppBundle:Registrant')
		    ->find($id);
		
		if (!$registrant) {
				throw $this->createNotFoundException(
					'No user found for id'.$id);
		}
		
        return $this->render('single_registrant.html.twig',array(
			'registrant' => $registrant,));
    }
}
