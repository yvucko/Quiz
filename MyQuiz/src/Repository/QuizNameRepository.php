<?php

namespace App\Repository;

use App\Entity\QuizName;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method QuizName|null find($id, $lockMode = null, $lockVersion = null)
 * @method QuizName|null findOneBy(array $criteria, array $orderBy = null)
 * @method QuizName[]    findAll()
 * @method QuizName[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class QuizNameRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, QuizName::class);
    }

    // /**
    //  * @return QuizName[] Returns an array of QuizName objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('q')
            ->andWhere('q.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('q.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?QuizName
    {
        return $this->createQueryBuilder('q')
            ->andWhere('q.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
