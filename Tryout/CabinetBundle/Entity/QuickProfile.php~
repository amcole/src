<?php

namespace Tryout\CabinetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * QuickProfile
 *
 * @ORM\Table(name="quickProfile")
 * @ORM\Entity(repositoryClass="Tryout\CabinetBundle\Entity\QuickProfileRepository")
 */
class QuickProfile
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
      * @ORM\ManyToOne(targetEntity="Tryout\CabinetBundle\Entity\Vendor", inversedBy="quickProfiles", cascade={"remove"})
	  * @ORM\JoinColumn(name="vendor_id", referencedColumnName="id")
	  * @ORM\JoinColumn(onDelete="CASCADE")
	  * 
     */
    protected $vendor;
			
	 /**
     * @var boolean
     *
     * @ORM\Column(name="vendorMultiLocation", type="boolean")
	 * @Assert\NotBlank()
     */
    private $vendorMultiLocation;

    /**
     * @var string
     *
     * @ORM\Column(name="vendorIndustry", type="string", length=255)
	 * @Assert\NotBlank()
     */
    private $vendorIndustry;
	
	/**
     * @var string
     *
     * @ORM\Column(name="publicCompany", type="boolean")
	 * @Assert\NotBlank()
     */
    private $publicCompany;

	/**
     * @var string
     *
     * @ORM\Column(name="numLevelsToOwner", type="integer")
	 * @Assert\NotBlank()
     */
    private $numLevelsToOwner;

	/**
     * @var string
     *
     * @ORM\Column(name="descCompanyCulture", type="integer")
	 * @Assert\NotBlank()
     */
    private $descCompanyCulture;

	/**
     * @var string
     *
     * @ORM\Column(name="peerlessService", type="string")
	 * @Assert\NotBlank()
     */
    private $peerlessService;
	
	/**
     * @var string
     *
     * @ORM\Column(name="client", type="string")
	 * @Assert\NotBlank()
     */
    private $client;

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
     * Set vendorMultiLocation
     *
     * @param boolean $vendorMultiLocation
     * @return QuickProfile
     */
    public function setVendorMultiLocation($vendorMultiLocation)
    {
        $this->vendorMultiLocation = $vendorMultiLocation;
    
        return $this;
    }

    /**
     * Get vendorMultiLocation
     *
     * @return boolean 
     */
    public function getVendorMultiLocation()
    {
        return $this->vendorMultiLocation;
    }

    /**
     * Set vendorIndustry
     *
     * @param string $vendorIndustry
     * @return QuickProfile
     */
    public function setVendorIndustry($vendorIndustry)
    {
        $this->vendorIndustry = $vendorIndustry;
    
        return $this;
    }

    /**
     * Get vendorIndustry
     *
     * @return string 
     */
    public function getVendorIndustry()
    {
        return $this->vendorIndustry;
    }

    /**
     * Set publicCompany
     *
     * @param string $publicCompany
     * @return QuickProfile
     */
    public function setPublicCompany($publicCompany)
    {
        $this->publicCompany = $publicCompany;
    
        return $this;
    }

    /**
     * Get publicCompany
     *
     * @return string 
     */
    public function getPublicCompany()
    {
        return $this->publicCompany;
    }

    /**
     * Set numLevelsToOwner
     *
     * @param integer $numLevelsToOwner
     * @return QuickProfile
     */
    public function setNumLevelsToOwner($numLevelsToOwner)
    {
        $this->numLevelsToOwner = $numLevelsToOwner;
    
        return $this;
    }

    /**
     * Get numLevelsToOwner
     *
     * @return integer 
     */
    public function getNumLevelsToOwner()
    {
        return $this->numLevelsToOwner;
    }

    /**
     * Set descCompanyCulture
     *
     * @param integer $descCompanyCulture
     * @return QuickProfile
     */
    public function setDescCompanyCulture($descCompanyCulture)
    {
        $this->descCompanyCulture = $descCompanyCulture;
    
        return $this;
    }

    /**
     * Get descCompanyCulture
     *
     * @return integer 
     */
    public function getDescCompanyCulture()
    {
        return $this->descCompanyCulture;
    }

    /**
     * Set peerlessService
     *
     * @param string $peerlessService
     * @return QuickProfile
     */
    public function setPeerlessService($peerlessService)
    {
        $this->peerlessService = $peerlessService;
    
        return $this;
    }

    /**
     * Get peerlessService
     *
     * @return string 
     */
    public function getPeerlessService()
    {
        return $this->peerlessService;
    }

    /**
     * Set client
     *
     * @param string $client
     * @return QuickProfile
     */
    public function setClient($client)
    {
        $this->client = $client;
    
        return $this;
    }

    /**
     * Get client
     *
     * @return string 
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Set vendor
     *
     * @param \Tryout\CabinetBundle\Entity\Vendor $vendor
     * @return QuickProfile
     */
    public function setVendor(\Tryout\CabinetBundle\Entity\Vendor $vendor = null)
    {
        $this->vendor = $vendor;
    
        return $this;
    }

    /**
     * Get vendor
     *
     * @return \Tryout\CabinetBundle\Entity\vendor 
     */
    public function getVendor()
    {
        return $this->vendor;
    }
}