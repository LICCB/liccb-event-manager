<?php

// src/AppBundle/Form/Registration.php

use Craue\FormFlowBundle\Form\FormFlow;
use Craue\FormFlowBundle\Form\FormFlowInterface;

class RegistrationVehicleFlow extends FormFlow {
    protected  function  loadStepsConfig()
    {
        return array(
            array(
                'label' => 'registrationType',
                'form_type' => 'AppBundle\Form\RegistrationForm',
            ),
            array(
                'label' => 'eventSelection',
                'form_type' => 'AppBundle\Form\RegistrationForm',
            ),
            array(
                'label' => 'preliminaryQuestions',
                'form_type' => 'AppBundle\Form\RegistrationForm',
            ),
            array(
                'label' => 'personalInfo',
                'form_type' => 'AppBundle\Form\RegistrationForm',
            ),
            array(
                'label' => 'eventDiscovery',
                'form_type' => 'AppBundle\Form\RegistrationForm',
            ),
        );
    }
}
