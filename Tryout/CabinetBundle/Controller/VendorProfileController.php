<?php

namespace Tryout\CabinetBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Tryout\CabinetBundle\Entity\VendorProfile;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use FOS\UserBundle\Security\UserProvider;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Tryout\UserBundle\Entity\User;
use FOS\UserBundle\Model\UserManagerInterface;



/**
 * VendorProfile controller.
 * @Route("/vendorprofile")
 */
class VendorProfileController extends Controller
{

    /**
     * Displays the Profile for the vendor entity .
	 * @Route("/", name="vendorProfile_index")
	 * @Template()
     *
     */
    public function indexAction()
    {

		//grab the entity manager from the the container
        $em = $this->getDoctrine()->getManager();
		
		//Grab the FOSBundle User Provider		
		$userProvider = $this->container->get('fos_user.user_provider.username');
		
		//Load the user by using the UserProvider's loadUserByUsername method and inserting
		//the security context service as the argument.
		$user = $userProvider
			->loadUserByUsername($this->container
					->get('security.context')
                    ->getToken()
                    ->getUsername()
				);
			
		//Extract the id from the User object and set it to $id
		$id = $user->getId();
				
        //Query the database to Find Vendors who belong to the the current user
        $vendor = $em
        	->getRepository('CabinetBundle:Vendor')
        	->findOneByIdJoinedToCategory($id);
		
		$slug = $vendor->getSlug();
				
	    $response = $this->forward( 'CabinetBundle:VendorProfile:show', array(
        	
        	'slug' => $slug
    	
		));
	       return  $response;
    }

    /**
     * Finds and displays a Vendor entity.
	 *  @Route("/{slug}", name="vp_show") 
	 * @Template()
     */
    public function showAction($slug)
    {
	    $em = $this->getDoctrine()->getManager();
	
	    $vendorProfile = $em->getRepository('CabinetBundle:VendorProfile')
	        ->findOneBySlugJoinedToCategory($slug);
			
		$vendor = $vendorProfile->getVendor();
					    	
		return array(
			
			'vendorProfile' => $vendorProfile,
			'vendor' => $vendor,
			);
			
	}

}