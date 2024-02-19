<?php

namespace App\Repository;

use App\Entity\RegleCroix;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<RegleCroix>
 *
 * @method RegleCroix|null find($id, $lockMode = null, $lockVersion = null)
 * @method RegleCroix|null findOneBy(array $criteria, array $orderBy = null)
 * @method RegleCroix[]    findAll()
 * @method RegleCroix[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RegleCroixRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RegleCroix::class);
    }

//    /**
//     * @return RegleCroix[] Returns an array of RegleCroix objects
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

//    public function findOneBySomeField($value): ?RegleCroix
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
