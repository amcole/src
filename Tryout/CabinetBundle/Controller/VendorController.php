<?php

namespace Tryout\CabinetBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;


use Tryout\CabinetBundle\Entity\Vendor;
use Tryout\CabinetBundle\Form\VendorType;


/**
 * Vendor controller.
 *
 */
class VendorController extends Controller
{

    /**
     * Lists all Vendor entities.
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
        $entities = $em
        	->getRepository('CabinetBundle:Vendor')
        	->findOwnerOfVendorEntityByUserID($id);
		
		//Set the response to the Vendors who correspond to the current user
        return $this->render('CabinetBundle:Vendor:index.html.twig', array(
            'entities' => $entities,
            
        ));
			
	/*
	 * Implementing the code from the blog here 
	 * 
	
        
        $response = new JsonResponse();
 
        $dataToReturn = array(
        
		    'entities' => $entities
	
        );
 
        $response->setData($dataToReturn);
 
        $this->get('session')->getFlashBag()->add(
            'success',
            'Your product has been added to your cart.'
        );
 
        return $response;         
			
		 * */
			
    }
	
    /**
     * Finds and displays a Vendor entity.
     *
     */
    public function showAction($slug)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em
        	->getRepository('CabinetBundle:Vendor')
        	->findOneBy(
        		array(
        			'slug' => $slug
					)
				);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Vendor entity.');
        }
		
    	//get the quickProfile object from the quickProfiles property
    	
    	$vendorId = $entity->getId(); 
    	
    	$quickProfiles = $em
    		->getRepository('CabinetBundle:QuickProfile')
			->findOwnerOfQuickProfileByVendorId($vendorId)
		;
		
    	//$qpId = $quickProfile->getId();
		
		 //echo $quickProfile; die;
		 
		if (!$quickProfiles){
			
        return $this->render('CabinetBundle:Modal:index.html.twig');
		}
    	
        $deleteForm = $this->createDeleteForm($entity->getId());

        return $this->render('CabinetBundle:Vendor:show.html.twig', array(
            'entity'      => $entity,
            'quickProfiles'      => $quickProfiles,
            'delete_form' => $deleteForm->createView(),        ));
    }	
		 
    /**
     * Creates a new Vendor entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Vendor();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('vendor_show', array('id' => $entity->getId())));
        }

        return $this->render('CabinetBundle:Vendor:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Vendor entity.
    *
    * @param Vendor $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Vendor $entity)
    {
        $form = $this->createForm(new VendorType(), $entity, array(
            'action' => $this->generateUrl('vendor_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Vendor entity.
     *
     */
    public function newAction()
    {
        $entity = new Vendor();
        $form   = $this->createCreateForm($entity);

        return $this->render('CabinetBundle:Vendor:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }



    /**
     * Displays a form to edit an existing Vendor entity.
     *
     */
    public function editAction($slug)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CabinetBundle:Vendor')->findOneBy(array('slug' => $slug));

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Vendor entity.');
        }

        $editForm = $this->createEditForm($entity);
		$deleteForm = $this->createDeleteForm($entity->getId());

        return $this->render('CabinetBundle:Vendor:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Vendor entity.
    *
    * @param Vendor $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Vendor $entity)
    {
        $form = $this->createForm(new VendorType(), $entity, array(
            'action' => $this->generateUrl('vendor_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Vendor entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CabinetBundle:Vendor')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Vendor entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('vendor_edit', array('id' => $id)));
        }

        return $this->render('CabinetBundle:Vendor:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Vendor entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('CabinetBundle:Vendor')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Vendor entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('vendor'));
    }

    /**
     * Creates a form to delete a Vendor entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('vendor_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
	
	    public function ddrAction()
    {

        return $this->render('CabinetBundle:Vendor:ddr.html.twig');
    }
	
	/**
	 * This method provides validates access to the full profile
	 */
	public function completedProfileAction(Vendor $id)
	{
	// Query the database for the vendor object
    $em = $this->getDoctrine()->getManager();
    $vendor = $em->getRepository('CabinetBundle:Vendor')->find($id);
	
	// Throw an exception if the vendor does not exist 
    if (!$vendor) {
        throw $this->createNotFoundException('No event found for id '.$id);
    }
	
	/**
	 * 
	 * Test to see if the quickProfile object has been passed to the vendor object by the 
	 * createAction Controller
	 *  
	 * if the quickProfile object was created by the createAction controller AND passed 
	 * to the vendor Object, render the full profile page
	 * if false, 
	 */
	
    if (!$vendor->hasQuickProfiles($this->getQuickProfiles())) {
    	//return an error or show a dialog box that tells the uer that they must complete the form
    	//
        $vendor->getAttendees()->add($this->getUser());
    }

    $em->persist($event);
    $em->flush();

    return $this->redirect($this->generateUrl('event_show', array(
        'slug' => $event->getSlug()
    )));
	}
	
}
