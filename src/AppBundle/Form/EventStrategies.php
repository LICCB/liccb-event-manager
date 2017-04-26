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
			// Strategy Selector
			->add('strategies', EntityType::class,  array(
				'class' => 'AppBundle\Entity\Strategy',
				'choice_label' => 'name',
				'label' => 'Strategies:',
				'attr' => array('class' => "Strategy_Select", 'id'=> 'strategies'),
			))
				
			// Name Entry Field
			->add('name', TextType::class, array(
				'label' => "Strategy Name:",
				'attr' => array('class' => 'Strategy_Field', 'id' => 'strategy_name'),
			))
			
			->add('over18', ChoiceType::class, array(
				'label' => false,
				'choices' => array(
					'True' => true,
					'False' => false,
				),
				'attr' => array('class' => "Strategy_Field"),
			))
			
			->add('over18W', IntegerType::class, array(
				'label' => false,
				'attr' => array('class' => "Strategy_Field", 'id' =>'over18W', 'min' => '-1', 'max' => '10', 'required'),
			))
			
			->add('over18Required', CheckboxType::class, array(
				'label' => false,
				'required' => false,
				'attr' => array('class' => "Strategy_Field"),
			))
			
			->add('swimExperience', ChoiceType::class, array(
				'label' => false,
				'choices' => array(
					'True' => true,
					'False' => false,
				),
				'attr' => array('class' => "Strategy_Field"),
			))
			
			->add('swimExperienceW', IntegerType::class, array(
				'label' => false,
				'attr' => array('class' => "Strategy_Field", 'min' => '-1', 'max' => '10', 'required'),
			))

			->add('swimExperienceRequired', CheckboxType::class, array(
				'label' => false,
				'required' => false,
				//'attr' => array('class' => "Strategy_Field"),
			))
			
			->add('boatExperience', ChoiceType::class, array(
				'label' => false,
				'choices' => array(
					'True' => true,
					'False' => false,	
				),
				'attr' => array('class' => "Strategy_Field"),
			))
			
			->add('boatExperienceW', IntegerType::class, array(
				'label' => false,
				'attr' => array('class' => "Strategy_Field", 'min' => '-1', 'max' => '10', 'required'),		
			))
			
			->add('boatExperienceRequired', CheckboxType::class, array(
				'label' => false,
				'required' => false,
				//'attr' => array('class' => "Strategy_Field"),
			))			
			
			->add('Cpr', ChoiceType::class, array(
				'label' => false,
				'choices' => array(
					'True' => true,
					'False' => false,
				),
				'attr' => array('class' => "Strategy_Field"),
			))
			
			->add('CprW', IntegerType::class, array(
				'label' => false,
				'attr' => array('class' => "Strategy_Field", 'min' => '-1', 'max' => '10', 'required'),
				
			))
			
			->add('CprRequired', CheckboxType::class, array(
				'label' => false,
				'required' => false,
				//'attr' => array('class' => "Strategy_Field"),
			))			
			
			->add('participantType', ChoiceType::class, array(
				'label' => false,
				'choices' => array(
					'Volunteer' => 'Volunteer',
					'Public' => 'Public',
				),
				'attr' => array('class' => "Strategy_Field"),
			))

			->add('participantTypeW', IntegerType::class, array(
				'label' => false,
				'attr' => array('class' => "Strategy_Field", 'min' => '-1', 'max' => '10', 'required'),
			))
			
			->add('participantTypeRequired', CheckboxType::class, array(
				'label' => false,
				'required' => false,
				//'attr' => array('class' => "Strategy_Field"),
			))
			
			->add('attendance', IntegerType::class, array(
				'label' => false,
				'attr' => array('class' => "Strategy_Field", 'min' => '0', 'max' => '100', 'required'),
			))

			->add('attendanceW', IntegerType::class, array(
				'label' => false,
				'attr' => array('class' => "Strategy_Field", 'min' => '-1', 'max' => '10', 'required'),
			))
			
			->add('attendanceRequired', CheckboxType::class, array(
				'label' => false,
				'required' => false,
				//'attr' => array('class' => "Strategy_Field"),
			))
			
			
			
			// The Buttons
			->add('applyStrategy', SubmitType::class, array(
				'label' => "Apply Selected Strategy",
				'attr' => array('class' => "Strategy_Button"),
			))
			->add('updateStrategy', SubmitType::class, array(
				'label' => "Update Selected Strategy",
				'attr' => array('class' => "Strategy_Button"),
			))
			->add('newStrategy', SubmitType::class, array(
				'label' => "Create New Strategy",
				'attr' => array('class' => "Strategy_Button"),
			))
			->add('deleteStrategy', SubmitType::class, array(
				'label' => "Delete Selected Strategy",
				'attr' => array('class' => "Strategy_Button", 'onclick' => 'return confirm("Are you sure? This action can not be un-done")'),
			));
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
