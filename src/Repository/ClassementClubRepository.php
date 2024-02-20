<?php

namespace App\Repository;

use App\Entity\ClassementClub;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ClassementClub>
 *
 * @method ClassementClub|null find($id, $lockMode = null, $lockVersion = null)
 * @method ClassementClub|null findOneBy(array $criteria, array $orderBy = null)
 * @method ClassementClub[]    findAll()
 * @method ClassementClub[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ClassementClubRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ClassementClub::class);
    }

//    /**
//     * @return ClassementClub[] Returns an array of ClassementClub objects
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

//    public function findOneBySomeField($value): ?ClassementClub
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
