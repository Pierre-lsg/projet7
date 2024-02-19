<?php

namespace App\Repository;

use App\Entity\ModeCompetition;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ModeCompetition>
 *
 * @method ModeCompetition|null find($id, $lockMode = null, $lockVersion = null)
 * @method ModeCompetition|null findOneBy(array $criteria, array $orderBy = null)
 * @method ModeCompetition[]    findAll()
 * @method ModeCompetition[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ModeCompetitionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ModeCompetition::class);
    }

//    /**
//     * @return ModeCompetition[] Returns an array of ModeCompetition objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('m.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ModeCompetition
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
