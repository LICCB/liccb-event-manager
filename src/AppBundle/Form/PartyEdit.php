<?php

namespace AppBundle\Form;

use AppBundle\Entity\Party;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PartyEdit extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
	    $builder
		    ->add('selectionStatus', ChoiceType::class, array(
			    'choices' => array(
				    'Unselected' => 'Unselected',
				    'Approved' => 'Approved',
				    'Denied' => 'Denied',
				    'Emailed' => 'Emailed',
			    ),
			    'label' => false,
			    'choice_attr' => function($val, $key, $index){
				    $disabled = false;
				    if($key == 'Emailed')
				    	$disabled = true;
				    return $disabled ? ['disabled' => 'disabled'] : [];
			    },
		    ))
		    ->add('selectionStatusReason', TextType::class, array(
		    	'label' => false,
		    ))
	    ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
	    $resolver->setDefaults(array(
	    	'data_class' => Party::class,
	    ));
    }

    public function getBlockPrefix()
    {
        return 'app_bundle_party_edit';
    }
}
