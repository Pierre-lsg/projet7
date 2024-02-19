<?php

namespace App\Repository;

use App\Entity\PointsClassementEquipe;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PointsClassementEquipe>
 *
 * @method PointsClassementEquipe|null find($id, $lockMode = null, $lockVersion = null)
 * @method PointsClassementEquipe|null findOneBy(array $criteria, array $orderBy = null)
 * @method PointsClassementEquipe[]    findAll()
 * @method PointsClassementEquipe[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PointsClassementEquipeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PointsClassementEquipe::class);
    }

//    /**
//     * @return PointsClassementEquipe[] Returns an array of PointsClassementEquipe objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?PointsClassementEquipe
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
