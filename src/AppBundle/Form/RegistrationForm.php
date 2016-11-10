<?php

namespace AppBundle\Form;

// src/AppBundle/Form/RegistrationForm.php
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class RegistrationForm extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        switch ($options['flow_step']) {
            case 1:
                $builder->add('registrationType', ChoiceType::class, array(
                    'choices' => array(
                        'Participant' => 'participant',
                        'Volunteer' => 'volunteer',
                    ),
                    'expanded' => true,
                    multiple => false,
                ));
                break;
            case 2:
                $builder->add('eventSelection', ChoiceType::class, array(
                    'choices' => array(
                        'Test1',
                    ),
                ));
                break;
            case 3:
                $builder->add('18OrOlder', ChoiceType::class, array(
                    'choices' => array(
                        'yes' => true,
                        'no' => false,
                    ),
                ));
                $builder->add('canSwim', ChoiceType::class, array(
                    'choices' => array(
                        'yes' => true,
                        'no' => false,
                    ),
                ));
                $builder->add('haveKayaked', ChoiceType::class, array(
                    'choices' => array(
                        'yes' => true,
                        'no' => false,
                    ),
                ));
                $builder->add('certifiedCPR', ChoiceType::class, array(
                    'choices' => array(
                        'yes' => true,
                        'no' => false,
                    ),
                ));
                break;
            case 4:
                $builder->add('fullName', TextType::class);
                $builder->add('email', EmailType::class);
                $builder->add('phoneNumber', TextType::class);
                $builder->add('emergencyContactName', TextType::class);
                $builder->add('emergencyContactNumber', TextType::class);
                $builder->add('boatSeats', IntegerType::class);
                $builder->add('pairingBoater', TextType::class);
                break;
            case 5:
                $builder->add('eventDiscovery', ChoiceType::class, array(
                    'choices' => array(
                        'LICCB Calendar' => 'calendar',
                        'Subscriber Newsletter or Direct Email' => 'subscriberLetter',
                        'LICCB Blog' => 'blog',
                        'Facebook' => 'facebook',
                        'Twitter' => 'twitter',
                        'Family or Friend' => 'familyorfriend',
                        'Press Publication' => 'presspublication',
                        'Web Search' => 'websearch',
                        'Flier' => 'flier',
                        'Saw us on the water' => 'sawonwater',
                        'Just walking by' => 'walkingby',
                        'Other' => 'other',
                    ),
                ));
                break;
        }

        public function getBlockPrefix(){
            return 'registration';
        }
    }

}