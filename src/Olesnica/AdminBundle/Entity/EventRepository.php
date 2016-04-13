<?php

namespace Olesnica\AdminBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;

/**
 * EventRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class EventRepository extends EntityRepository
{
    public function getRecentEvents($limit = null, $performance = null)
    {
        $qb = $this->createQueryBuilder('e');

        $qb->select('e')
            ->where('e.startDate < :now')
            ->andWhere(
              $qb->expr()->orX(
                $qb->expr()->isNull('e.finishDate'),
                $qb->expr()->lt('e.finishDate', ':now')
              )
            )
            ->setParameter('now', new \DateTime())
        ;

        if (is_null($performance) === false) {
          $qb->andWhere('e.performance = :performance')
              ->setParameter('performance', $performance);
        }

        if (is_null($limit) === false) {
          $qb->setMaxResults($limit);
        }

        $qb->orderBy('e.startDate', 'DESC')
            ->addOrderBy('e.startTime', 'DESC')
        ;

        return $qb->getQuery()->getResult();
    }

    public function getLatestEvents($limit = null, $performance = null)
    {
        $qb = $this->createQueryBuilder('e');

        $qb->select('e')
            ->where('e.startDate >= :now')
            ->orWhere(
              $qb->expr()->andX(
                $qb->expr()->isNotNull('e.finishDate'),
                $qb->expr()->gte('e.finishDate', ':now')
              )
            )
            ->setParameter('now', new \DateTime())
        ;

        if (is_null($performance) === false) {
          $qb->andWhere('e.performance = :performance')
             ->setParameter('performance', $performance)
          ;
        }

        if (is_null($limit) === false) {
          $qb->setMaxResults($limit);
        }

        $qb->orderBy('e.startDate', 'DESC')
           ->addOrderBy('e.startTime', 'DESC')
        ;

        return $qb->getQuery()->getResult();
    }
}