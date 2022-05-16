<?php

namespace App\Repository;

use App\Entity\Confier;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Confier|null find($id, $lockMode = null, $lockVersion = null)
 * @method Confier|null findOneBy(array $criteria, array $orderBy = null)
 * @method Confier[]    findAll()
 * @method Confier[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ConfierRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Confier::class);
    }

    // /**
    //  * @return Confier[] Returns an array of Confier objects
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
    public function findOneBySomeField($value): ?Confier
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
