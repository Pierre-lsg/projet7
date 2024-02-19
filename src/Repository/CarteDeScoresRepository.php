<?php

namespace App\Repository;

use App\Entity\CarteDeScores;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CarteDeScores>
 *
 * @method CarteDeScores|null find($id, $lockMode = null, $lockVersion = null)
 * @method CarteDeScores|null findOneBy(array $criteria, array $orderBy = null)
 * @method CarteDeScores[]    findAll()
 * @method CarteDeScores[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CarteDeScoresRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CarteDeScores::class);
    }

//    /**
//     * @return CarteDeScores[] Returns an array of CarteDeScores objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?CarteDeScores
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
