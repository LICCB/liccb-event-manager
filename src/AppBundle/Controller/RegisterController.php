<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Craue\FormFlowBundle\Form\FormFlowInterface;
use AppBundle\Form\RegistrationForm;
use AppBundle\Entity\Registration;

class RegisterController extends Controller
{
    public function registerAction()
    {
    	$formData = new Registration(); // Form data class

        $flow = $this->get('AppBundle.form.flow.registration'); // Flow service id
	    $flow->bind($formData);

	    // Form current step
        $form = $flow->createForm();
        if($flow->isValid($form)){
            $flow->saveCurrentStepData($form);

            if($flow->nextStep()){
            	// Form for next step
                $form = $flow->createForm();
            } else {
            	// Flow finished, save to DB
            	$em = $this->getDoctrine()->getManager();
	            $em->persist($formData);
	            $em->flush();

                $flow->reset(); // Remove step data from session

	            return $this->redirect($this->generateUrl('home')); // redirect
            }
        }

        return $this->render('register/register.html.twig', array(
            'form' => $form->createView(),
            'flow' => $flow,
        ));
    }


}
