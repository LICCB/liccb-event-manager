<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PermissionRolesMatrix extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
	    $builder
		    ->add('permissions', CollectionType::class, array(
		    	'entry_type' => PermissionRoles::class,
		    ))
		    ->add('update', SubmitType::class, array('label' => 'Update'))
		    ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
    	// Intentionally blank
    }

    public function getBlockPrefix()
    {
        return 'app_bundle_permission_roles_matrix';
    }
}
