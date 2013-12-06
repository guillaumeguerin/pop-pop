<?php

namespace Yabe\UserBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface;
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseType;

class RegistrationFormType extends BaseType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        $builder
            ->add('firstname')
            ->add('lastname')
	    ->add('phone')
	    ->add('profilePicture')
            ;
    }

    public function getName()
    {
        return 'yabe_user_registration';
    }
}
