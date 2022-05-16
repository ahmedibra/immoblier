<?php

namespace App\Repository;

use App\Entity\Annonce;
use App\Entity\User;
use App\Entity\AnnonceSearch;
use Doctrine\Migrations\Query\Query;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @method Annonce|null find($id, $lockMode = null, $lockVersion = null)
 * @method Annonce|null findOneBy(array $criteria, array $orderBy = null)
 * @method Annonce[]    findAll()
 * @method Annonce[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AnnonceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Annonce::class);
    }

    public function getUsers($role,$email)
  {
    $qb = $this->createQueryBuilder('a');
    $qb->select('a, u')
       ->join('a.user', 'u')
       ->andWhere('u.roles LIKE :role')
       ->setParameter('role', '%'.$role.'%')
       ->andWhere('u.email = :email')
       ->setParameter('email', $email);
    return $qb->getQuery()->getResult();
  }
    public function findUsers()
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.etat = :etat')
            ->setParameter('etat', 'Nouveau')
            ->andWhere('a.status = :status')
            ->setParameter('status', true)
            ->getQuery()
            ->getResult()
        ;
    }

    public function findByExampleField()
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.etat = :etat')
            ->setParameter('etat', 'Nouveau')
            ->andWhere('a.status = :status')
            ->setParameter('status', true)
            ->getQuery()
            ->getResult()
        ;
    }
    
    public function findAllVisibleQuery(AnnonceSearch $search)
    {
        $query = $this->createQueryBuilder('p');
        if($search->getMaxSurface()){
            $query = $query
                ->andWhere('p.surface > :minsurface')
                ->setParameter('minsurface',$search->getMaxSurface());
        }
        if($search->getMaxPrice()){
            $query = $query
                ->andWhere('p.price < :maxprice')
                ->setParameter('maxprice',$search->getMaxPrice());
        }
        if($search->getTypedebien()){
            $query = $query
                ->andWhere('p.typedebien = :typedebien')
                ->setParameter('typedebien',$search->getTypedebien());
        }
        if($search->getVille()){
            $query = $query
                ->andWhere('p.ville = :ville')
                ->setParameter('ville',$search->getVille());
        }
        if($search->getTransaction()){
            $query = $query
                ->andWhere('p.transaction = :transaction')
                ->setParameter('transaction',$search->getTransaction());
        }
            $query = $query
                ->andWhere('p.status = :status')
                ->setParameter('status',true);
        
            return $query->getQuery()
            //
            ->getResult()
            ;

    }

    // /**
    //  * @return Annonce[] Returns an array of Annonce objects
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
    public function findOneBySomeField($value): ?Annonce
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
