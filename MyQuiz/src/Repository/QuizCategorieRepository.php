<?php

namespace App\Repository;

use App\Entity\QuizCategorie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method QuizCategorie|null find($id, $lockMode = null, $lockVersion = null)
 * @method QuizCategorie|null findOneBy(array $criteria, array $orderBy = null)
 * @method QuizCategorie[]    findAll()
 * @method QuizCategorie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class QuizCategorieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, QuizCategorie::class);
    }

    // /**
    //  * @return QuizCategorie[] Returns an array of QuizCategorie objects
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
    public function findOneBySomeField($value): ?QuizCategorie
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
