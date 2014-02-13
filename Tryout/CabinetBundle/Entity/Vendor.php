<?php

namespace Tryout\CabinetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use FOS\UserBundle\Entity\Vendor as BaseUser;
use Doctrine\Common\Collections\ArrayCollection;



/**
 * Vendor
 *
 * @ORM\Table()
 * @ORM\Entity()
 * @ORM\Entity(repositoryClass="Tryout\CabinetBundle\Entity\VendorRepository")
 * 
 */
class Vendor
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
     * @ORM\Column(name="vendorName", type="string", length=255)
     */
    private $vendorName;

	/**
	 * @ORM\OneToMany(targetEntity="Tryout\CabinetBundle\Entity\QuickProfile", mappedBy="vendor")
	 */
	protected $quickProfiles;	
	
	/**
	 * @ORM\OneToOne(targetEntity="Tryout\CabinetBundle\Entity\VendorProfile", mappedBy="vendor")
	 */
	protected $vendorProfiles;
	
	 /**
      * @ORM\ManyToOne(targetEntity="Tryout\UserBundle\Entity\User", inversedBy="vendors", cascade={"remove"})
	  * @ORM\JoinColumn(onDelete="CASCADE")
	  * 
     */
    protected $ownerOfVendorEntity;	
	
	/**
	 * @Gedmo\Slug(fields={"vendorName"}, updatable=false)
	 * @ORM\Column(length=255, unique=true)
	 */
	protected $slug;
	
	
	
	/**
	 * @Gedmo\Timestampable(on="create")
	 * @ORM\Column(type="datetime")
	 */
	private $created;
	
	/**
	 * @Gedmo\Timestampable(on="update")
	 * @ORM\Column(type="datetime")
	 */
	private $updated;
	
	
	public function __construct()
	{
    $this->quickProfiles = new ArrayCollection();
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
     * Set vendorName
     *
     * @param string $vendorName
     * @return Vendor
     */
    public function setVendorName($vendorName)
    {
        $this->vendorName = $vendorName;
    
        return $this;
    }

    /**
     * Get vendorName
     *
     * @return string 
     */
    public function getVendorName()
    {
        return $this->vendorName;
    }


    /**
     * Set slug
     *
     * @param string $slug
     * @return Vendor
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
    
        return $this;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return Vendor
     */
    public function setCreated($created)
    {
        $this->created = $created;
    
        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime 
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set updated
     *
     * @param \DateTime $updated
     * @return Vendor
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;
    
        return $this;
    }

    /**
     * Get updated
     *
     * @return \DateTime 
     */
    public function getUpdated()
    {
        return $this->updated;
    }
	
	public function getQuickProfiles()
	{
	    return $this->quickProfiles;
	}
	
	public function hasQuickProfiles(\Tryout\CabinetBundle\Entity\QuickProfile $quickProfile)
	{
    return $this->getQuickProfiles()->contains($id);
	}

    /**
     * Add quickProfiles
     *
     * @param \Tryout\CabinetBundle\Entity\QuickProfile $quickProfiles
     * @return Vendor
     */
    public function addQuickProfiles(\Tryout\CabinetBundle\Entity\QuickProfile $quickProfile)
    {
        $this->quickProfiles[] = $quickProfiles;
    
        return $this;
    }

    /**
     * Remove quickProfiles
     *
     * @param \Tryout\CabinetBundle\Entity\QuickProfile $quickProfiles
     */
    public function removeQuickProfile(\Tryout\CabinetBundle\Entity\QuickProfile $quickProfiles)
    {
        $this->quickProfiles->removeElement($quickProfiles);
    }

    /**
     * Set ownerOfVendorEntity
     *
     * @param \Tryout\UserBundle\Entity\User $ownerOfVendorEntity
     * @return Vendor
     */
    public function setOwnerOfVendorEntity(\Tryout\UserBundle\Entity\User $ownerOfVendorEntity = null)
    {
        $this->ownerOfVendorEntity = $ownerOfVendorEntity;
    
        return $this;
    }

    /**
     * Get ownerOfVendorEntity
     *
     * @return \Tryout\UserBundle\Entity\User 
     */
    public function getOwnerOfVendorEntity()
    {
        return $this->ownerOfVendorEntity;
    }

    /**
     * Add quickProfiles
     *
     * @param \Tryout\CabinetBundle\Entity\QuickProfile $quickProfiles
     * @return Vendor
     */
    public function addQuickProfile(\Tryout\CabinetBundle\Entity\QuickProfile $quickProfiles)
    {
        $this->quickProfiles[] = $quickProfiles;
    
        return $this;
    }

    /**
     * Set vendorProfiles
     *
     * @param \Tryout\CabinetBundle\Entity\VendorProfile $vendorProfiles
     * @return Vendor
     */
    public function setVendorProfiles(\Tryout\CabinetBundle\Entity\VendorProfile $vendorProfiles = null)
    {
        $this->vendorProfiles = $vendorProfiles;
    
        return $this;
    }

    /**
     * Get vendorProfiles
     *
     * @return \Tryout\CabinetBundle\Entity\VendorProfile 
     */
    public function getVendorProfiles()
    {
        return $this->vendorProfiles;
    }
}