<?php

namespace Tryout\CabinetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * VendorProfile
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Tryout\CabinetBundle\Entity\VendorProfileRepository")
 */
class VendorProfile
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
     * @ORM\OneToOne(targetEntity="Vendor", inversedBy="vendorProfiles")
     * @ORM\JoinColumn(name="vendor_id", referencedColumnName="id")
     */
    protected $vendor;

    /**
     * @ORM\OneToOne(targetEntity="\Tryout\CabinetBundle\Entity\ManagementProfile", mappedBy="vendorProfile")
	 * @ORM\OneToOne(targetEntity="\Tryout\CabinetBundle\Entity\ContactProfile", mappedBy="vendorProfile")
	 * @ORM\OneToOne(targetEntity="\Tryout\CabinetBundle\Entity\ServiceProfile", mappedBy="vendorProfile")
     */
    protected $profiles;

	public function __construct()
	{
    $this->profiles = new ArrayCollection();
	}

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
     * Set profiles
     *
     * 
     * @return VendorProfile
     */
    public function setProfiles($profiles = null)
    {
        $this->profiles = $profiles;
    
        return $this;
    }

    /**
     * Get profiles
     *
     */
    public function getProfiles()
    {
        return $this->profiles;
    }

    /**
     * Set vendor
     *
     * @param \Tryout\CabinetBundle\Entity\Vendor $vendor
     * @return VendorProfile
     */
    public function setVendor(\Tryout\CabinetBundle\Entity\Vendor $vendor = null)
    {
        $this->vendor = $vendor;
    
        return $this;
    }

    /**
     * Get vendor
     *
     * @return \Tryout\CabinetBundle\Entity\Vendor 
     */
    public function getVendor()
    {
        return $this->vendor;
    }
}