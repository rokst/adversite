<?php

namespace AppBundle\Service;

use AppBundle\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Registry;

class AdManager
{
    private $doctrine;

    /**
     * AdManager constructor.
     * @param Registry $doctrine
     */
    public function __construct($doctrine)
    {
        $this->doctrine = $doctrine;
    }

    public function getAllAds()
    {
        $repository = $this->doctrine->getManager()
            ->getRepository('AppBundle:Ad');
        $query = $repository->createQueryBuilder('a')->
        select('a AS advert', 'u.username', 'c.name')
            ->innerJoin('a.userId', 'u')
            ->innerJoin('a.category', 'c')
            ->orderBy('a.date', 'DESC')
            ->getQuery();

        return $query->getResult();
    }

    public function getUserAds(User $user)
    {
        $repository = $this->doctrine->getManager()
            ->getRepository('AppBundle:Ad');
        $query = $repository->createQueryBuilder('a')->
        select('a AS advert', 'c.name')
            ->where('a.userId = ' . $user->getId())
            ->innerJoin('a.category', 'c')
            ->getQuery();

        return $query->getResult();
    }
}