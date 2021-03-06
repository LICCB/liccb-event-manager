<?php

namespace AppBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GroupType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
	    $builder->add('roles', EntityType::class, array(
		    'class' => 'AppBundle\Entity\PermissionRole',
		    'choice_label' => 'name',
		    'expanded' => true,
		    'multiple' => true,
		    'label' => false,
	    ));
    }

	public function getParent()
    {
	    return 'FOS\UserBundle\Form\Type\GroupFormType';
    }

	public function getBlockPrefix()
    {
        return 'app_bundle_group_type';
    }
}
