<?php

namespace AppBundle\Form;

use AppBundle\Entity\Event;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EventEdit extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
	    $builder
		    ->add('name', TextType::class)
		    ->add('save', SubmitType::class)
	    ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
	    $resolver->setDefaults(array(
	    	'data_class' => Event::class,
	    ));
    }

    public function getBlockPrefix()
    {
        return 'app_bundle_event_edit';
    }
}
