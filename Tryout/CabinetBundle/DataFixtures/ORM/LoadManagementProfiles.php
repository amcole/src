<?php

namespace Tryout\CabinetBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Tryout\CabinetBundle\Entity\ManagementProfile;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;

class LoadManagementProfile extends AbstractFixture implements OrderedFixtureInterface

{
    public function load(ObjectManager $manager)
    {
			
				
		$vendorProfile1 = $this->getReference('vp1-vp1');
		 
	// Instantiate the first MangementProfile Object			
		$managementProfile1 = new ManagementProfile();
	    $managementProfile1->setGuarantee(True);
		$managementProfile1->setWhoDealsWithProblems('production manager');
		$managementProfile1->setHandlingEmergencies('manager');
		$managementProfile1->setVendorProfile($vendorProfile1);
				
	    $manager->persist($managementProfile1);

		$manager->flush();

    }
	
    public function getOrder()
    {
        return 60;
    }
}