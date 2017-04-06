<?php

namespace AppBundle\Form;

use AppBundle\Entity\Strategy;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class EventStrategies extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
	    $builder
			->add('strategies', EntityType::class,  array(
				'class' => 'AppBundle\Entity\Strategy',
				'choice_label' => 'name'))
			->add('updateStrategy', SubmitType::class, array('label' => "Update"))
			->add('newStrategy', SubmitType::class, array('label' => "Create New"));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
	    $resolver->setDefaults(array(
	    	'data_class' => NULL,
	    ));
    }

    public function getBlockPrefix()
    {
        return 'app_bundle_strategies';
    }
}
