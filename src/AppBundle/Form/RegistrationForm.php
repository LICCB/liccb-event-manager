<?php

namespace AppBundle\Form;

// src/AppBundle/Form/RegistrationForm.php
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

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
		        $builder->add('event_selection', EntityType::class, array(
			        'class' => 'AppBundle\Entity\Org_event',
			        'query_builder' => function(EntityRepository $er){
			        	$now = new \DateTime();
				        return $er->createQueryBuilder('e')
					        ->where('e.signupStart <= :today')
					        ->andWhere('e.signupEnd >= :today')
					        ->setParameter('today', $now->format('Y-m-d'));
			        },
			        'choice_label' => 'orgEventName',
		        ));
		        break;
	        case 3:
		        $builder->add('over18', ChoiceType::class, array(
			        'choices' => array(
				        'yes' => true,
				        'no' => false,
			        ),
			        'expanded' => true,
			        'multiple' => false,
		        ));
		        $builder->add('can_swim', ChoiceType::class, array(
			        'choices' => array(
				        'yes' => true,
				        'no' => false,
			        ),
			        'expanded' => true,
			        'multiple' => false,
		        ));
		        $builder->add('boat_experience', ChoiceType::class, array(
			        'choices' => array(
				        'yes' => true,
				        'no' => false,
			        ),
			        'expanded' => true,
			        'multiple' => false,
		        ));
		        $builder->add('cpr_certification', ChoiceType::class, array(
			        'choices' => array(
				        'yes' => true,
				        'no' => false,
			        ),
			        'expanded' => true,
			        'multiple' => false,
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