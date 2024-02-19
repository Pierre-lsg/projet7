<?php

namespace App\Repository;

use App\Entity\ReglementCompetition;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ReglementCompetition>
 *
 * @method ReglementCompetition|null find($id, $lockMode = null, $lockVersion = null)
 * @method ReglementCompetition|null findOneBy(array $criteria, array $orderBy = null)
 * @method ReglementCompetition[]    findAll()
 * @method ReglementCompetition[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReglementCompetitionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ReglementCompetition::class);
    }

//    /**
//     * @return ReglementCompetition[] Returns an array of ReglementCompetition objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('r.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ReglementCompetition
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
