<?php

namespace Tryout\CabinetBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Tryout\CabinetBundle\Entity\Vendor;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;

class LoadVendors extends AbstractFixture implements OrderedFixtureInterface

{
    public function load(ObjectManager $manager)
    {
			
					
	/**
	 * Access a created Reference object created in the User object data fixtures file.
	 * This file will allow the user fixture data object to share data with the Vendor 
	 * fixture data object
	 */
		$user1 = $this->getReference('user-user1');
		 
	// Instantiate the first Vendor				
		$vendor1 = new Vendor();
	    $vendor1->setVendorName('XYZ Web Developers');
		$vendor1->setOwnerOfVendorEntity($user1);
		
	/**
	 * Create a Reference so the quickProfile fixture data object can share
	 *  data with the Vendor fixture data object
	 */
    	$this->addReference('vendor-vendor', $vendor1);
				
	    $manager->persist($vendor1);

	/**
	 * Access a created Reference object created in the User object data fixtures file.
	 * This file will allow the user fixture data object to share data with the Vendor 
	 * fixture data object
	 */
		$user2 = $this->getReference('user-user2');
	// Instantiate a second Vendor			
		$vendor2 = new Vendor();
	    $vendor2->setVendorName('Spartan Cleaning');
		$vendor2->setOwnerOfVendorEntity($user2);
	    $manager->persist($vendor2);


	/**
	 * Access a created Reference object created in the User object data fixtures file.
	 * This file will allow the user fixture data object to share data with the Vendor 
	 * fixture data object
	 */
		$user3 = $this->getReference('user-user3');	
	// Instantiate a third Vendor		
		$vendor3 = new Vendor();
	    $vendor3->setVendorName('Johnson Office Supplies');
		$vendor3->setOwnerOfVendorEntity($user3);
	    $manager->persist($vendor3);
		
		$manager->flush();

    }
	
    public function getOrder()
    {
        return 20;
    }
}