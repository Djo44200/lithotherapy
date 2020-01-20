<?php

namespace App\Repository;

use App\Entity\Hardness;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Hardness|null find($id, $lockMode = null, $lockVersion = null)
 * @method Hardness|null findOneBy(array $criteria, array $orderBy = null)
 * @method Hardness[]    findAll()
 * @method Hardness[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HardnessRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Hardness::class);
    }

    // /**
    //  * @return Hardness[] Returns an array of Hardness objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('h.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Hardness
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
