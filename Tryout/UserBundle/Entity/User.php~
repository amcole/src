<?php

namespace Tryout\UserBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;



/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
	
	
	/**
	 * @ORM\OneToMany(targetEntity="Tryout\CabinetBundle\Entity\Vendor", mappedBy="ownerOfVendorEntity")
	 */
	protected $vendors;
	
	/**
     * @ORM\Column(type="text", length=100)	 
	*/
	protected $firstName;
	
	
	/**
     * @ORM\Column(type="text", length=100)	 
	*/
	protected $lastName;		
	
		
    public function __construct()
    {
        parent::__construct();
        // your own logic
        
            $this->vendors = new ArrayCollection();
        
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
     * Set googleID
     *
     * @param string $googleID
     * @return User
     */
    public function setGoogleID($googleID)
    {
        $this->googleID = $googleID;
    
        return $this;
    }

    /**
     * Get googleID
     *
     * @return string 
     */
    public function getGoogleID()
    {
        return $this->googleID;
    }

    /**
     * Add vendors
     *
     * @param \Tryout\CabinetBundle\Entity\Vendor $vendors
     * @return User
     */
    public function addVendor(\Tryout\CabinetBundle\Entity\Vendor $vendors)
    {
        $this->vendors[] = $vendors;
    
        return $this;
    }

    /**
     * Remove vendors
     *
     * @param \Tryout\CabinetBundle\Entity\Vendor $vendors
     */
    public function removeVendor(\Tryout\CabinetBundle\Entity\Vendor $vendors)
    {
        $this->vendors->removeElement($vendors);
    }

    /**
     * Get vendors
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getVendors()
    {
        return $this->vendors;
    }



    /**
     * Set firstName
     *
     * @param string $firstName
     * @return User
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    
        return $this;
    }

    /**
     * Get firstName
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     * @return User
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    
        return $this;
    }

    /**
     * Get lastName
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->lastName;
    }
}