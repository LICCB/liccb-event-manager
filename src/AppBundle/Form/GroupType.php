<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GroupType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
	    $builder->add('rolesForm', PermissionRoles::class);
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
