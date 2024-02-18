<?php

namespace App\Repository;

use App\Entity\Repere;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Repere>
 *
 * @method Repere|null find($id, $lockMode = null, $lockVersion = null)
 * @method Repere|null findOneBy(array $criteria, array $orderBy = null)
 * @method Repere[]    findAll()
 * @method Repere[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RepereRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Repere::class);
    }

//    /**
//     * @return Repere[] Returns an array of Repere objects
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

//    public function findOneBySomeField($value): ?Repere
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
