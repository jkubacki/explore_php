<?php

namespace Fantasygame\TeamBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Campaign
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Fantasygame\TeamBundle\Entity\CampaignRepository")
 */
class Campaign
{
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="id", type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $id;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="name", type="string", length=255)
	 */
	private $name;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="description", type="text")
	 */
	private $description;

	/**
	 * @ORM\ManyToMany(targetEntity="Sheet", inversedBy="campaigns")
	 * @ORM\JoinTable(name="campaign_sheet")
	 */
	private $sheets;

	/**
	 * Get id
	 *
	 * @return integer 
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Set id
	 *
	 * @return integer 
	 */
	public function setId($id)
	{
		$this->id = $id;

		return $id;
	}

	/**
	 * Set name
	 *
	 * @param string $name
	 * @return Campaign
	 */
	public function setName($name)
	{
		$this->name = $name;

		return $this;
	}

	/**
	 * Get name
	 *
	 * @return string 
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * Set description
	 *
	 * @param string $description
	 * @return Campaign
	 */
	public function setDescription($description)
	{
		$this->description = $description;

		return $this;
	}

	/**
	 * Get description
	 *
	 * @return string 
	 */
	public function getDescription()
	{
		return $this->description;
	}

	/**
	 * Constructor
	 */
	public function __construct()
	{
		$this->sheets = new \Doctrine\Common\Collections\ArrayCollection();
	}

	/**
	 * Add sheets
	 *
	 * @param \Fantasygame\TeamBundle\Entity\Sheet $sheets
	 * @return Campaign
	 */
	public function addSheet(\Fantasygame\TeamBundle\Entity\Sheet $sheets)
	{
		$this->sheets[] = $sheets;

		return $this;
	}

	/**
	 * Remove sheets
	 *
	 * @param \Fantasygame\TeamBundle\Entity\Sheet $sheets
	 */
	public function removeSheet(\Fantasygame\TeamBundle\Entity\Sheet $sheets)
	{
		$this->sheets->removeElement($sheets);
	}

	/**
	 * Get sheets
	 *
	 * @return \Doctrine\Common\Collections\Collection 
	 */
	public function getSheets()
	{
		return $this->sheets;
	}

}