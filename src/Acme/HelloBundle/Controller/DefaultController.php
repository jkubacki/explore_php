<?php

namespace Acme\HelloBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use \Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{

	public function indexAction($name)
	{
		return $this->render('AcmeHelloBundle:Default:index.html.twig', array('name' => $name));
	}

	public function countingAction($from, $to)
	{
		return $this->render('AcmeHelloBundle:Default:counting.html.twig', array('from' => $from, 'to' => $to));
	}

}
