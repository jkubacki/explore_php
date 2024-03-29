<?php

namespace Fantasygame\TeamBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Fantasygame\TeamBundle\Entity\Campaign;
use Symfony\Component\HttpFoundation\Response;
use \Fantasygame\TeamBundle\Form\Type\CampaignType;

class DefaultController extends Controller
{

	public function indexAction()
	{
		$repository = $this->getDoctrine()->getRepository('Fantasygame\TeamBundle\Entity\CampaignRepository');
		$repository->getAll();
		return $this->render('FantasygameTeamBundle:Default:index.html.twig', array('name' => $name));
	}

	public function editCampaignAction($id)
	{
		$em = $this->getDoctrine()->getEntityManager();
		if (!$id) {
			$form = $this->createForm(new CampaignType(), null, array(
				'action' => $this->generateUrl('fantasygame_campaign_edit'),
			));
			$request = $this->getRequest();
			$form->handleRequest($request);
			$formCampaign = $form->getData();
			if ($formCampaign) {
				if ($formCampaign->getId()) {
					$campaign = $em->find('Fantasygame\TeamBundle\Entity\Campaign', $formCampaign->getId());
					$campaign->setName($formCampaign->getName());
					$campaign->setDescription($formCampaign->getDescription());
				} else {
					$campaign = $formCampaign;
				}
				$em->persist($campaign);
				$em->flush();
				return $this->redirect(
								$this->generateUrl("fantasygame_campaign_edit", array("id" => $campaign->getId()))
				);
			}
		} else {
			$campaign = $em->find('Fantasygame\TeamBundle\Entity\Campaign', $id);
			$form = $this->createForm(new CampaignType(), $campaign, array(
				'action' => $this->generateUrl('fantasygame_campaign_edit'),
			));
		}

		return $this->render('FantasygameTeamBundle:Default:form.html.twig', array('form' => $form->createView()));
	}

	public function addCampaignAction()
	{
		$em = $this->getDoctrine()->getEntityManager();
		$sheet = $em->find('Fantasygame\TeamBundle\Entity\Sheet', 1);

		$campaign = new Campaign();
		$campaign->setName('Goverowo');
		$campaign->setDescription('Kampania śmiechowa');
		$campaign->addSheet($sheet);

		$em->persist($campaign);
		$em->flush();
		return new Response('ok');
	}

}
