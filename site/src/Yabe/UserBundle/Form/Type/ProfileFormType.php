<?php

namespace Yabe\UserBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface;
use FOS\UserBundle\Form\Type\ProfileFormType as BaseType;

class ProfileFormType extends BaseType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        $builder
            ->remove('username')
            ->add('firstname')
            ->add('lastname')
            ->add('phone')
            ->add('address')
            ->add('profilePicture')
            ;
    }

    public function getName()
    {
        return 'yabe_user_profile';
    }
}