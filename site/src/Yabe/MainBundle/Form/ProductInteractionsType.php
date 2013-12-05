<?php

namespace Yabe\MainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProductInteractionsType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('clicks')
            ->add('rating')
            ->add('user')
            ->add('product')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Yabe\MainBundle\Entity\ProductInteractions'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'yabe_mainbundle_productinteractions';
    }
}
