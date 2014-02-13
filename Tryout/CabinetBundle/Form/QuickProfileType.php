<?php

namespace Tryout\CabinetBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class QuickProfileType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('vendorMultiLocation')
            ->add('vendorIndustry')
            ->add('publicCompany')
            ->add('numLevelsToOwner')
            ->add('descCompanyCulture')
            ->add('peerlessService')
            ->add('client')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Tryout\CabinetBundle\Entity\QuickProfile'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'tryout_cabinetbundle_quickprofile';
    }
}
