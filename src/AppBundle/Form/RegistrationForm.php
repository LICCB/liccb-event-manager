<?php

namespace AppBundle\Form;

// src/AppBundle/Form/RegistrationForm.php
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;

class RegistrationForm extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        switch ($options['flow_step']) {
	        case 1:
		        $builder->add('registration_type', ChoiceType::class, array(
			        'choices' => array(
				        'Participant' => 'participant',
				        'Volunteer' => 'volunteer',
			        ),
			        'expanded' => true,
			        'multiple' => false,
		        ));
		        break;
	        case 2:
		        $builder->add('event_selection', ChoiceType::class, array(
			        'choices' => array(
				        'Test1',
			        ),
		        ));
		        break;
	        case 3:
		        $builder->add('over18', ChoiceType::class, array(
			        'choices' => array(
				        'yes' => true,
				        'no' => false,
			        ),
		        ));
		        $builder->add('can_swim', ChoiceType::class, array(
			        'choices' => array(
				        'yes' => true,
				        'no' => false,
			        ),
		        ));
		        $builder->add('boat_experience', ChoiceType::class, array(
			        'choices' => array(
				        'yes' => true,
				        'no' => false,
			        ),
		        ));
		        $builder->add('cpr_certification', ChoiceType::class, array(
			        'choices' => array(
				        'yes' => true,
				        'no' => false,
			        ),
		        ));
		        break;
	        case 4:
		        $builder->add('full_name', TextType::class);
		        $builder->add('email', EmailType::class);
		        $builder->add('phone_number', TextType::class);
		        $builder->add('emergency_contact_name', TextType::class);
		        $builder->add('emergency_contact_number', TextType::class);
		        $builder->add('boat_seats', IntegerType::class);
		        $builder->add('pairing_boater', TextType::class);
		        break;
	        case 5:
		        $builder->add('event_discovery', ChoiceType::class, array(
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
    }

	public function getBlockPrefix(){
		return 'registration';
	}
}