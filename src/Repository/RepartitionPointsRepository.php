<?php

namespace App\Repository;

use App\Entity\RepartitionPoints;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<RepartitionPoints>
 *
 * @method RepartitionPoints|null find($id, $lockMode = null, $lockVersion = null)
 * @method RepartitionPoints|null findOneBy(array $criteria, array $orderBy = null)
 * @method RepartitionPoints[]    findAll()
 * @method RepartitionPoints[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RepartitionPointsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RepartitionPoints::class);
    }

//    /**
//     * @return RepartitionPoints[] Returns an array of RepartitionPoints objects
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

//    public function findOneBySomeField($value): ?RepartitionPoints
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
