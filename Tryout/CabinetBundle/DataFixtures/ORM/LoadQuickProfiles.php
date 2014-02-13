<?php

namespace Tryout\EventBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Tryout\CabinetBundle\Entity\QuickProfile;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;

class LoadQuickProfiles extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
	    	
			
		/**
		 * Access a created Reference object created in the Vendor object data fixtures file.
		 * This file will allow the quickProfile fixture data object to share data with the Vendor 
		 * fixture data object
		 */
	    $vendor1 = $this->getReference('vendor-vendor');

		//adds the first quickProfile data fixture
        $quickProfile1 = new QuickProfile();
        $quickProfile1->setVendorMultiLocation('false');
        $quickProfile1->setVendorIndustry('Insurance');
        $quickProfile1->setPublicCompany('true');
        $quickProfile1->setPeerlessService('Boat Insurance');
        $quickProfile1->setDescCompanyCulture('mom and pop');
        $quickProfile1->setClient('Dr.Oz');
        $quickProfile1->setNumLevelsToOwner('5');
        $quickProfile1->setVendor($vendor1);		
        $manager->persist($quickProfile1);


		//adds the second quickProfile data fixture
        $quickProfile2 = new QuickProfile();
        $quickProfile2->setVendorMultiLocation('true');
        $quickProfile2->setVendorIndustry('Networking');
        $quickProfile2->setPublicCompany('false');
        $quickProfile2->setPeerlessService('MidSize businesses');
        $quickProfile2->setDescCompanyCulture('corporate');
        $quickProfile2->setClient('Edible Arrangments');
        $quickProfile2->setNumLevelsToOwner('6');
        //$quickProfile2->setVendor($vendor);		
        $manager->persist($quickProfile2);

		//adds the third quickProfile data fixture
        $quickProfile3 = new QuickProfile();
        $quickProfile3->setVendorMultiLocation('true');
        $quickProfile3->setVendorIndustry('Lanscaping');
        $quickProfile3->setPublicCompany('no');
        $quickProfile3->setPeerlessService('condominiums');
        $quickProfile3->setDescCompanyCulture('Mom & Pop');
        $quickProfile3->setClient('Edible Arrangments');
        $quickProfile3->setNumLevelsToOwner('2');
        //$quickProfile3->setVendor($vendor);				
        $manager->persist($quickProfile3);

        // the queries aren't done until now
        $manager->flush();
    }
	
	public function getOrder()
	{
		return 30;
	}
}