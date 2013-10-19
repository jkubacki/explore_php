<?php

namespace Fantasygame\TeamBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CampaignType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder
				->add('id', 'hidden')
				->add('name', 'text')
				->add('description', 'textarea')
				->add('save', 'submit');
	}

	public function getName()
	{
		return 'campaign';
	}

	public function setDefaultOptions(OptionsResolverInterface $resolver)
	{
		$resolver->setDefaults(array(
			'data_class' => 'Fantasygame\TeamBundle\Entity\Campaign',
		));
	}

}

?>
