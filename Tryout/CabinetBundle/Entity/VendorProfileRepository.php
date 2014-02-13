<?php

namespace Tryout\CabinetBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * VendorProfileRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class VendorProfileRepository extends EntityRepository
{

	public function findOneBySlugJoinedToCategory($slug)
	{
	    $query = $this->getEntityManager()
	        ->createQuery('
	            SELECT vp, v FROM CabinetBundle:VendorProfile vp
            	JOIN vp.vendor v
	            WHERE v.slug = :slug'
	        )->setParameter('slug', $slug);
	
	    try {
	        return $query->getSingleResult();
	    } catch (\Doctrine\ORM\NoResultException $e) {
	        return null;
	    }
	}	
	
	
}
