<?php

namespace AppBundle\Form;

use AppBundle\Entity\Permission;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PermissionRoles extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
	    $builder
		    ->add('roles', EntityType::class, array(
		    	'class' => 'AppBundle\Entity\PermissionRole',
			    'choice_label' => 'name',
			    'expanded' => true,
			    'multiple' => true,
			    'label' => false,
		    ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
	    $resolver->setDefaults(array(
	    	'data_class' => Permission::class
	    ));
    }

    public function getBlockPrefix()
    {
        return 'app_bundle_role_permission_matrix';
    }
}
