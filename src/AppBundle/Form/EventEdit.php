<?php

namespace AppBundle\Form;

use AppBundle\Entity\Org_event;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EventEdit extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
	    $builder
		    ->add('orgEventName', TextType::class)
		    ->add('orgEventType', TextType::class)
		    ->add('capacity', NumberType::class)
		    ->add('date', DateType::class)
		    ->add('signupStart', DateType::class)
		    ->add('signupEnd', DateType::class)
		    ->add('orgEventDescription', TextType::class)
		    ->add('save', SubmitType::class)
	    ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
	    $resolver->setDefaults(array(
	    	'data_class' => Org_event::class,
	    ));
    }

    public function getBlockPrefix()
    {
        return 'app_bundle_event_edit';
    }
}
