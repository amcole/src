<?php

namespace Tryout\UserBundle\Listener;

use FOS\UserBundle\FOSUserEvents;
use FOS\UserBundle\Event\FormEvent;
use FOS\UserBundle\Model\UserManagerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use FOS\UserBundle\Event\FilterUserResponseEvent;


/**
 * Listener responsible to change the redirection at the end of the password resetting
 */
class AddVendorRoleListener implements EventSubscriberInterface
{
	private $userManager;
	

    public function __construct( UserManagerInterface $userManager)
    {
		$this->userManager = $userManager;
		
    }

    /**
     * {@inheritDoc}
     */
    public static function getSubscribedEvents()
    {
        return array(
            FOSUserEvents::REGISTRATION_COMPLETED => 'onRegistration_Completed',
        );
    }
	/**
	 * Adds ROLE_Vendor to the user object when the REGISTRATION_COMPLETED event is triggered.
	 */
    public function onRegistration_Completed(FilterUserResponseEvent $event){
        	
		// access the user object from  the registration form event using the UserEvent Parent Class	
        $user = $event->getUser();
		//implement the userManager service and add ROLE_Vendor using the userManager 
		//object
		$userManager = $user->addRole('vendor');
		
		//persist the addRole('vendor') changes to the database
		$this->userManager->updateUser($user);
	}
		
}