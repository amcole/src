<?php

namespace Tryout\CabinetBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ContactProfileType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('industry')
            ->add('primaryService')
            ->add('secondaryService')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Tryout\CabinetBundle\Entity\ServiceProfile'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'tryout_cabinetbundle_serviceprofile';
    }
}
