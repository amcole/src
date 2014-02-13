<?php

namespace Tryout\CabinetBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Tryout\CabinetBundle\Entity\VendorProfile;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;

class LoadVendorProfile extends AbstractFixture implements OrderedFixtureInterface

{
    public function load(ObjectManager $manager)
    {
			
		$vendor1 = $this->getReference('vendor-vendor');
		
		$vendorProfile1 = new VendorProfile();
		$vendorProfile1->setVendor($vendor1);
		
					
		$this->addReference('vp1-vp1',$vendorProfile1);

	    $manager->persist($vendorProfile1);
		
		$manager->flush();

    }
	
    public function getOrder()
    {
        return 40;
    }
}