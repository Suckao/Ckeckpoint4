<?php

namespace App\Repository;

use App\Entity\Newlesters;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Newlesters|null find($id, $lockMode = null, $lockVersion = null)
 * @method Newlesters|null findOneBy(array $criteria, array $orderBy = null)
 * @method Newlesters[]    findAll()
 * @method Newlesters[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NewlestersRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Newlesters::class);
    }

    // /**
    //  * @return Newlesters[] Returns an array of Newlesters objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('n.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Newlesters
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
