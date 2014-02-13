<?php

namespace Tryout\CabinetBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Tryout\CabinetBundle\Entity\QuickProfile;
use Tryout\CabinetBundle\Form\QuickProfileType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;


/**
 * QuickProfile controller.
 * @Route("/quickprofile")
 * 
 */
class QuickProfileController extends Controller
{

    /**
     * Lists all QuickProfile entities.
	 *  @Route("/", name="quick_index")
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('CabinetBundle:QuickProfile')->findAll();

        return $this->render('CabinetBundle:QuickProfile:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a QuickProfile entity.
	 *  @Route("/show", name="quick_show")    
	 */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CabinetBundle:QuickProfile')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find QuickProfile entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('CabinetBundle:QuickProfile:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing QuickProfile entity.
	 *  @Route("/edit", name="quick_edit")    
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CabinetBundle:QuickProfile')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find QuickProfile entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('CabinetBundle:QuickProfile:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a QuickProfile entity.
    *
    * @param QuickProfile $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(QuickProfile $entity)
    {
        $form = $this->createForm(new QuickProfileType(), $entity, array(
            'action' => $this->generateUrl('quickprofile_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing QuickProfile entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CabinetBundle:QuickProfile')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find QuickProfile entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('quickprofile_edit', array('id' => $id)));
        }

        return $this->render('CabinetBundle:QuickProfile:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a QuickProfile entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('CabinetBundle:QuickProfile')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find QuickProfile entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('quickprofile'));
    }

    /**
     * Creates a form to delete a QuickProfile entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('quickprofile_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
	
	
	/**
	 * @Route("/create", name="quick_create")
	 * @Template
	 */
	public function createAction(Request $request)
	{
        $quickProfile = new QuickProfile();

        $form = $this->createForm(new QuickProfileType(), $quickProfile);

        if ($request->isMethod('POST')) {
            $form->bind($request);

            if ($form->isValid()) {
                $profileObject = $form->getData();

                $em = $this->getDoctrine()->getManager();
                $em->persist($profileObject);
                $em->flush();

                $url = $this->generateUrl('quick_index');

                return $this->redirect($url);
            }
        }

        return array('form' => $form->createView());
    }

	
}
