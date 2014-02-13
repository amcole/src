<?php

namespace Tryout\CabinetBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Tryout\CabinetBundle\Entity\ServiceProfile;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;

class LoadServiceProfile extends AbstractFixture implements OrderedFixtureInterface

{
    public function load(ObjectManager $manager)
    {
		$vendorProfile1 = $this->getReference('vp1-vp1');
		 
	// Instantiate the first ServiveProfile Object			
		$serviceProfile1 = new ServiceProfile();
	    $serviceProfile1->setIndustry('Web Development');
		$serviceProfile1->setPrimaryService('php frameworks');
		$serviceProfile1->setSecondaryService('rails frameworks');
		$serviceProfile1->setVendorProfile($vendorProfile1);
				
	    $manager->persist($serviceProfile1);

		$manager->flush();

    }
	
    public function getOrder()
    {
        return 70;
    }
		
    }
