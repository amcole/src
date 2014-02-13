<?php

namespace Tryout\CabinetBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Tryout\CabinetBundle\Entity\ContactProfile;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;

class LoadContactProfiles extends AbstractFixture implements OrderedFixtureInterface

{
    public function load(ObjectManager $manager)
    {
			
					
	/**
	 * Access a created Reference object created in the User object data fixtures file.
	 * This file will allow the user fixture data object to share data with the Vendor 
	 * fixture data object
	 */
		$vendorProfile1 = $this->getReference('vp1-vp1');
		 
	// Instantiate the first Vendor				
		$contactProfile1 = new ContactProfile();
	    $contactProfile1->setMainContact('salesman');
		$contactProfile1->setSecondContact('owner');
		$contactProfile1->setHeadquarters('omaha');
		$contactProfile1->setVendorProfile($vendorProfile1);
		
	    $manager->persist($contactProfile1);
		
		$manager->flush();

    }
	
    public function getOrder()
    {
        return 50;
    }
}