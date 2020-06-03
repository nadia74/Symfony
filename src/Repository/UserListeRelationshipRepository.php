<?php

namespace App\Repository;

use App\Entity\UserListeRelationship;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method UserListeRelationship|null find($id, $lockMode = null, $lockVersion = null)
 * @method UserListeRelationship|null findOneBy(array $criteria, array $orderBy = null)
 * @method UserListeRelationship[]    findAll()
 * @method UserListeRelationship[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserListeRelationshipRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UserListeRelationship::class);
    }

    // /**
    //  * @return UserListeRelationship[] Returns an array of UserListeRelationship objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?UserListeRelationship
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
