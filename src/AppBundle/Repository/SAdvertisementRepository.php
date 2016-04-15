<?php

namespace AppBundle\Repository;

/**
 * SAdvertisementRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class SAdvertisementRepository extends \Doctrine\ORM\EntityRepository
{
    public function findByPhone($phone)
    {
        return $this->createQueryBuilder('a')
            ->select('a.comment, a.url')
            ->innerJoin('a.phoneLink', 'phoneLink')
            ->innerJoin('phoneLink.phone', 'phone')
            ->where('phone.phone = :phone')
            ->setParameter('phone', $phone)
            ->setMaxResults(10)
            ->orderBy('a.inserted', 'DESC')
            ->getQuery()
            ->getArrayResult();
    }
}
