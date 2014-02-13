<?php

namespace Tryout\UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

class MyFixtures extends AbstractFixture implements OrderedFixtureInterface, FixtureInterface, ContainerAwareInterface
 {

    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * {@inheritDoc}
     */
    public function setContainer(ContainerInterface $container = null) {
        $this->container = $container;
    }

    public function load(ObjectManager $manager) {

        $userManager = $this->container->get('fos_user.user_manager');
		
        // Create a new user
        $user1 = $userManager->createUser();
        $user1->setUsername('user1');
        $user1->setEmail('user1@user1.com');
        $user1->setPlainPassword('user1');
        $user1->setFirstName('John');
        $user1->setLastName('Englishman');		
        $user1->setEnabled(true);
		
		/**
		 * Create a Reference so the vendor fixture data object can share
		 *  data with the user fixture data object
		 */
		$this->addReference('user-user1', $user1);
		
		//Make doctrine aware of the User
        $manager->persist($user1);
		
        // Create a second user
        $user2 = $userManager->createUser();
        $user2->setUsername('user2');
        $user2->setEmail('user2@user2.com');
        $user2->setPlainPassword('user2');
        $user2->setFirstName('Rob');
        $user2->setLastName('Scottsdale');
        $user2->setEnabled(true);
		
		/**
		 * Create a Reference so the vendor fixture data object can share
		 *  data with the user fixture data object
		 */
		$this->addReference('user-user2', $user2);

		//Make doctrine aware of the User		
        $manager->persist($user2);		

        // Create a third user
        $user3 = $userManager->createUser();
        $user3->setUsername('user3');
        $user3->setEmail('user3@user3.com');
        $user3->setPlainPassword('user3');
        $user3->setFirstName('Aaron');
        $user3->setLastName('Ireland');
        $user3->setEnabled(true);
		
		/**
		 * Create a Reference so the vendor fixture data object can share
		 *  data with the user fixture data object
		 */
		$this->addReference('user-user3', $user3);	
		
		//Make doctrine aware of the User
        $manager->persist($user3);		
		
		//saves all of the users to the database
        $manager->flush();
		
	}
	
	    public function getOrder()
    {
        return 10;
    }
	
}