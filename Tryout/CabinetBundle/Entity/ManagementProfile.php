<?php

namespace Tryout\CabinetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ManagementProfile
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Tryout\CabinetBundle\Entity\ManagementProfileRepository")
 */
class ManagementProfile
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
     * @var boolean
     *
     * @ORM\Column(name="guarantee", type="boolean")
     */
    private $guarantee;

    /**
     * @var string
     *
     * @ORM\Column(name="whoDealsWithProblems", type="string", length=255)
     */
    private $whoDealsWithProblems;

    /**
     * @var string
     *
     * @ORM\Column(name="handlingEmergencies", type="string", length=255)
     */
    private $handlingEmergencies;

    /**
     * @ORM\OneToOne(targetEntity="VendorProfile", inversedBy="profiles")
     * @ORM\JoinColumn(name="vendorProfile_id", referencedColumnName="id")
     */
    protected $vendorProfile;

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
     * Set guarantee
     *
     * @param boolean $guarantee
     * @return ManagementProfile
     */
    public function setGuarantee($guarantee)
    {
        $this->guarantee = $guarantee;
    
        return $this;
    }

    /**
     * Get guarantee
     *
     * @return boolean 
     */
    public function getGuarantee()
    {
        return $this->guarantee;
    }

    /**
     * Set whoDealsWithProblems
     *
     * @param string $whoDealsWithProblems
     * @return ManagementProfile
     */
    public function setWhoDealsWithProblems($whoDealsWithProblems)
    {
        $this->whoDealsWithProblems = $whoDealsWithProblems;
    
        return $this;
    }

    /**
     * Get whoDealsWithProblems
     *
     * @return string 
     */
    public function getWhoDealsWithProblems()
    {
        return $this->whoDealsWithProblems;
    }

    /**
     * Set handlingEmergencies
     *
     * @param string $handlingEmergencies
     * @return ManagementProfile
     */
    public function setHandlingEmergencies($handlingEmergencies)
    {
        $this->handlingEmergencies = $handlingEmergencies;
    
        return $this;
    }

    /**
     * Get handlingEmergencies
     *
     * @return string 
     */
    public function getHandlingEmergencies()
    {
        return $this->handlingEmergencies;
    }

    /**
     * Set vendorProfile
     *
     * @param \Tryout\CabinetBundle\Entity\VendorProfile $vendorProfile
     * @return ManagementProfile
     */
    public function setVendorProfile(\Tryout\CabinetBundle\Entity\VendorProfile $vendorProfile = null)
    {
        $this->vendorProfile = $vendorProfile;
    
        return $this;
    }

    /**
     * Get vendorProfile
     *
     * @return \Tryout\CabinetBundle\Entity\VendorProfile 
     */
    public function getVendorProfile()
    {
        return $this->vendorProfile;
    }
}