<?php

namespace App\Repository;

use App\Entity\QuizAnswers;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method QuizAnswers|null find($id, $lockMode = null, $lockVersion = null)
 * @method QuizAnswers|null findOneBy(array $criteria, array $orderBy = null)
 * @method QuizAnswers[]    findAll()
 * @method QuizAnswers[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class QuizAnswersRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, QuizAnswers::class);
    }

    // /**
    //  * @return QuizAnswers[] Returns an array of QuizAnswers objects
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
    public function findOneBySomeField($value): ?QuizAnswers
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
