<?php

namespace Tryout\CabinetBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class VendorBasicProfileFormType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('vendorName')
            ->add('vendorIndustry')
			->add('vendorMultiLocation', 'checkbox', array(
				    'multiLocation'   => 'Multiple Locations',
				    'required'  => false,
				))
			->add('publicCompany', 'checkbox', array(
				    'public'   => 'Publicly Traded Company',
				    'required'  => false,
				))
				
			->add('numLevelsToOwner', 'choice', array(
				    'choices'   => array(
				        '1' => '1',
				        '2' => '2',
				        '3' => '3',
				        '4' => '4',
				        '5' => '5',
				        '6' => '6',
						
				    ),
				    'multiple'  => FALSE,
				))

        ;
    }
	
	public function setDefaultOptions(OptionsResolverInterface $resolver)
	{
	    $resolver->setDefaults(array(
	        'data_class' => 'Tryouts\CabinetBundle\Entity\Vendor',
	    ));
	}    
	
    public function getName()
    {
        return 'cabinet_vendor_registration';
    }
}
