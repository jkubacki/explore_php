<?php

namespace Fantasygame\TeamBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('FantasygameTeamBundle:Default:index.html.twig', array('name' => $name));
    }
}
