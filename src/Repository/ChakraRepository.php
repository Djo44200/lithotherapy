<?php

namespace App\Repository;

use App\Entity\Chakra;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Chakra|null find($id, $lockMode = null, $lockVersion = null)
 * @method Chakra|null findOneBy(array $criteria, array $orderBy = null)
 * @method Chakra[]    findAll()
 * @method Chakra[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ChakraRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Chakra::class);
    }

    // /**
    //  * @return Chakra[] Returns an array of Chakra objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Chakra
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
