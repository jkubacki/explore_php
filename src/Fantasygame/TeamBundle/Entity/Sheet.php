<?php

namespace Fantasygame\TeamBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sheet
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Fantasygame\TeamBundle\Entity\SheetRepository")
 */
class Sheet
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
	 * @var float
	 *
	 * @ORM\Column(name="money", type="float")
	 */
	private $money;

	/**
	 * @ORM\ManyToMany(targetEntity="Campaign", mappedBy="sheets")
	 */
	private $campaigns;

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
	 * Set name
	 *
	 * @param string $name
	 * @return Sheet
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
	 * @return Sheet
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
	 * Set money
	 *
	 * @param float $money
	 * @return Sheet
	 */
	public function setMoney($money)
	{
		$this->money = $money;

		return $this;
	}

	/**
	 * Get money
	 *
	 * @return float 
	 */
	public function getMoney()
	{
		return $this->money;
	}

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->campaigns = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add campaigns
     *
     * @param \Fantasygame\TeamBundle\Entity\Campaign $campaigns
     * @return Sheet
     */
    public function addCampaign(\Fantasygame\TeamBundle\Entity\Campaign $campaigns)
    {
        $this->campaigns[] = $campaigns;
    
        return $this;
    }

    /**
     * Remove campaigns
     *
     * @param \Fantasygame\TeamBundle\Entity\Campaign $campaigns
     */
    public function removeCampaign(\Fantasygame\TeamBundle\Entity\Campaign $campaigns)
    {
        $this->campaigns->removeElement($campaigns);
    }

    /**
     * Get campaigns
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCampaigns()
    {
        return $this->campaigns;
    }
}