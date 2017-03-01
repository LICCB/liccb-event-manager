<?php

// src/AppBundle/Form/RegistrationFlow.php

namespace AppBundle\Form;

use Craue\FormFlowBundle\Form\FormFlow;
use Craue\FormFlowBundle\Form\FormFlowInterface;

class RegistrationFlow extends FormFlow {
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
            array(
                'label' => 'confirmation',
            ),
        );
    }
}
