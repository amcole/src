<?php

namespace Tryout\CabinetBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('CabinetBundle:Default:index.html.twig', array('name' => $name));
    }
}
