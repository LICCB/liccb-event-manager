<?php

namespace AppBundle\Form;

use AppBundle\Entity\Org_event;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EventRegistrantsEdit extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
	    $builder
		    ->add('parties', CollectionType::class, array(
			    'entry_type' => PartyEdit::class,
		    ))
		    ->add('update', SubmitType::class, array('label' => "Updated Approval Status"))
		    ->add("update_and_email", SubmitType::class, array('label' => "Updated Approved and Email"))
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
        return 'app_bundle_event_registrants';
    }
}
