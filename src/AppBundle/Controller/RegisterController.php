<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Craue\FormFlowBundle\Form\FormFlowInterface;
use AppBundle\Form\RegistrationForm;

class RegisterController extends Controller
{
    public function registerAction()
    {
        $flow = $this->get('AppBundle.form.flow.registration');

        $form = $flow->createForm();
        if($flow->isValid($form)){
            $flow->saveCurrentStepData($form);

            if($flow->nextStep()){
                $form = $flow->createForm();
            } else {
                $flow->reset();
            }
        }

        return $this->render('AppBundle:Register:register.html.twig', array(
            'form' => $form->createView(),
            'flow' => $flow,
        ));
    }


}
