<?php

namespace AppBundle\Repository;

/**
 * PostRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class PostRepository extends \Doctrine\ORM\EntityRepository
{
   public function findLatest()
   {
       return $this->createQueryBuilder('p')
           ->join('p.tags', 't')
           ->select('p, t')
           ->getQuery()
           ->getResult();
   }

    public function findByTag($tag)
    {
        return $this->createQueryBuilder('p')
            ->join('p.tags', 't')
            ->select('p, t')
            ->where('t.title = :title')
            ->setParameter('title', $tag)
            ->addSelect('t')
            ->getQuery()
            ->getResult();
    }

}
