<?php

namespace Tryout\CabinetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ServiceProfile
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Tryout\CabinetBundle\Entity\ServiceProfileRepository")
 */
class ServiceProfile
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
     * @ORM\Column(name="industry", type="string", length=255)
     */
    private $industry;

    /**
     * @var string
     *
     * @ORM\Column(name="primaryService", type="string", length=255)
     */
    private $primaryService;

    /**
     * @var string
     *
     * @ORM\Column(name="secondaryService", type="string", length=255)
     */
    private $secondaryService;

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
     * Set industry
     *
     * @param string $industry
     * @return ServiceProfile
     */
    public function setIndustry($industry)
    {
        $this->industry = $industry;
    
        return $this;
    }

    /**
     * Get industry
     *
     * @return string 
     */
    public function getIndustry()
    {
        return $this->industry;
    }

    /**
     * Set primaryService
     *
     * @param string $primaryService
     * @return ServiceProfile
     */
    public function setPrimaryService($primaryService)
    {
        $this->primaryService = $primaryService;
    
        return $this;
    }

    /**
     * Get primaryService
     *
     * @return string 
     */
    public function getPrimaryService()
    {
        return $this->primaryService;
    }

    /**
     * Set secondaryService
     *
     * @param string $secondaryService
     * @return ServiceProfile
     */
    public function setSecondaryService($secondaryService)
    {
        $this->secondaryService = $secondaryService;
    
        return $this;
    }

    /**
     * Get secondaryService
     *
     * @return string 
     */
    public function getSecondaryService()
    {
        return $this->secondaryService;
    }

    /**
     * Set vendorProfile
     *
     * @param \Tryout\CabinetBundle\Entity\VendorProfile $vendorProfile
     * @return ServiceProfile
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