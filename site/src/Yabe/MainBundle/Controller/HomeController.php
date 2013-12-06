<?php

namespace Yabe\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class HomeController extends Controller
{
    public function indexAction() {
        return $this->render('YabeMainBundle:Home:index.html.twig');
    }
}