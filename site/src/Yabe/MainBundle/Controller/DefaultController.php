<?php

namespace Yabe\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('YabeMainBundle:Default:index.html.twig', array('name' => $name));
    }
}
