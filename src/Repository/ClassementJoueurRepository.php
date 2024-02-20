<?php

namespace App\Repository;

use App\Entity\ClassementJoueur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ClassementJoueur>
 *
 * @method ClassementJoueur|null find($id, $lockMode = null, $lockVersion = null)
 * @method ClassementJoueur|null findOneBy(array $criteria, array $orderBy = null)
 * @method ClassementJoueur[]    findAll()
 * @method ClassementJoueur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ClassementJoueurRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ClassementJoueur::class);
    }

//    /**
//     * @return ClassementJoueur[] Returns an array of ClassementJoueur objects
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

//    public function findOneBySomeField($value): ?ClassementJoueur
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
