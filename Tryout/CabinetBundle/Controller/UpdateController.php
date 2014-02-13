<?php

namespace Tryout\CabinetBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class UpdateController extends Controller 
{
	
	/** 
	 * @Route("/update", name="update") 
	 * @Template
	 */
	public function UpdateAction() 
	{

	$form = $this->createFormBuilder()
            ->add('vendorName')
            ->add('vendorIndustry')
			->add('vendorMultiLocation', 'choice', array(
				    'choices'   => array('1' => 'True', '0' => 'False'),
				    'required'  => false,
				))
				
				->getForm();
				return array('form' => $form->createView());

	}
}