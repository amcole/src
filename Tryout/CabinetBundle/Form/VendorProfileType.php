<?php

namespace Tryout\CabinetBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class VendorProfileType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
	    	->add(
	    		'tryout_cabinetbundle_contactprofile', 
	    		'collection', 
	    		array('type' => new ContactProfileType()
			))
	    	->add(
	    		'tryout_cabinetbundle_managementprofile', 
	    		'collection', 
	    		array('type' => new ManagementProfileType()
			))
			->add(
	    		'tryout_cabinetbundle_serviceprofile', 
	    		'collection', 
	    		array('type' => new ServiceProfileType())
			);
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Tryout\CabinetBundle\Entity\VendorProfile'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'tryout_cabinetbundle_vendorprofile';
    }
}
