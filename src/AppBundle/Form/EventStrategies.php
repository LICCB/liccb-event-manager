<?php

namespace AppBundle\Form;

use AppBundle\Entity\Strategy;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
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
			->add('name', TextType::class, array(
				'label' => "Strategy Name:",
			))
			
			->add('over18', ChoiceType::class, array(
				'label' => false,
				'choices' => array(
					'True' => true,
					'False' => false,
				),
			))
			
			->add('over18W', IntegerType::class, array(
				'label' => false,
				'attr' => array('min' => '0', 'max' => '10', 'required'),
			))
			
			->add('over18Required', CheckboxType::class, array(
				'label' => false,
				'required' => false,
			))
			
			->add('swimExperience', ChoiceType::class, array(
			'label' => false,
				'choices' => array(
					'True' => true,
					'False' => false,
				),
			))
			
			->add('swimExperienceW', IntegerType::class, array(
				'label' => false,
				'attr' => array('min' => '0', 'max' => '10', 'required'),
			))

			->add('swimExperienceRequired', CheckboxType::class, array(
				'label' => false,
				'required' => false,
			))
			
			->add('boatExperience', ChoiceType::class, array(
				'label' => false,
				'choices' => array(
					'True' => true,
					'False' => false,
				),
			))
			
			->add('boatExperienceW', IntegerType::class, array(
				'label' => false,
				'attr' => array('min' => '0', 'max' => '10', 'required'),		
			))
			
			->add('boatExperienceRequired', CheckboxType::class, array(
				'label' => false,
				'required' => false,
			))			
			
			->add('Cpr', ChoiceType::class, array(
				'label' => false,
				'choices' => array(
					'True' => true,
					'False' => false,
				),
			))
			
			->add('CprW', IntegerType::class, array(
				'label' => false,
				'attr' => array('min' => '0', 'max' => '10', 'required'),
				
			))
			
			->add('CprRequired', CheckboxType::class, array(
				'label' => false,
				'required' => false,
			))			
			
			->add('participantType', ChoiceType::class, array(
				'label' => false,
				'choices' => array(
					'True' => true,
					'False' => false,
				),
			))

			->add('participantTypeW', IntegerType::class, array(
				'label' => false,
				'attr' => array('min' => '0', 'max' => '10', 'required'),
			))
			
			->add('participantTypeRequired', CheckboxType::class, array(
				'label' => false,
				'required' => false,
			))
			->add('applyStrategy', SubmitType::class, array('label' => "Apply Strategy"))
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
