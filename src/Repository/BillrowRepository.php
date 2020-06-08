<?php

namespace App\Repository;

use App\Entity\Billrow;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Billrow|null find($id, $lockMode = null, $lockVersion = null)
 * @method Billrow|null findOneBy(array $criteria, array $orderBy = null)
 * @method Billrow[]    findAll()
 * @method Billrow[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BillrowRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Billrow::class);
    }

    // /**
    //  * @return Billrow[] Returns an array of Billrow objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Billrow
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
