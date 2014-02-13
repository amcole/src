<?php

namespace Tryout\CabinetBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * QuickProfile controller.
 * @Route("/modal")
 */
class ModalController extends Controller
{

    /**
     * Displays the modal .
	 *  @Route("/", name="modal_index")
	 * @Template()
     *
     */
    public function indexAction()
    {
            return array();
    }




}