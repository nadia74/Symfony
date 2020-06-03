<?php

namespace App\Repository;

use App\Entity\ListeMovieRelationship;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ListeMovieRelationship|null find($id, $lockMode = null, $lockVersion = null)
 * @method ListeMovieRelationship|null findOneBy(array $criteria, array $orderBy = null)
 * @method ListeMovieRelationship[]    findAll()
 * @method ListeMovieRelationship[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ListeMovieRelationshipRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ListeMovieRelationship::class);
    }

    // /**
    //  * @return ListeMovieRelationship[] Returns an array of ListeMovieRelationship objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ListeMovieRelationship
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
