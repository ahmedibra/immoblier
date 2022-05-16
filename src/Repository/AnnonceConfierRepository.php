<?php

namespace App\Repository;

use App\Entity\AnnonceConfier;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AnnonceConfier|null find($id, $lockMode = null, $lockVersion = null)
 * @method AnnonceConfier|null findOneBy(array $criteria, array $orderBy = null)
 * @method AnnonceConfier[]    findAll()
 * @method AnnonceConfier[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AnnonceConfierRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AnnonceConfier::class);
    }

    // /**
    //  * @return AnnonceConfier[] Returns an array of AnnonceConfier objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?AnnonceConfier
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
