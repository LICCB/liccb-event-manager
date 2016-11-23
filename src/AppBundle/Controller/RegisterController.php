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
    	$formData = new Registration();

        $flow = $this->get('AppBundle.form.flow.registration');
	    $flow->bind($formData);

        $form = $flow->createForm();
        if($flow->isValid($form)){
            $flow->saveCurrentStepData($form);

            if($flow->nextStep()){
                $form = $flow->createForm();
            } else {
                $flow->reset();
            }
        }

        return $this->render('register/register.html.twig', array(
            'form' => $form->createView(),
            'flow' => $flow,
        ));
    }


}
