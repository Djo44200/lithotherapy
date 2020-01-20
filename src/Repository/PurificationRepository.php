<?php

namespace App\Repository;

use App\Entity\Purification;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Purification|null find($id, $lockMode = null, $lockVersion = null)
 * @method Purification|null findOneBy(array $criteria, array $orderBy = null)
 * @method Purification[]    findAll()
 * @method Purification[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PurificationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Purification::class);
    }

    // /**
    //  * @return Purification[] Returns an array of Purification objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Purification
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
