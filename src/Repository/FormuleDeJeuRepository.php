<?php

namespace App\Repository;

use App\Entity\FormuleDeJeu;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<FormuleDeJeu>
 *
 * @method FormuleDeJeu|null find($id, $lockMode = null, $lockVersion = null)
 * @method FormuleDeJeu|null findOneBy(array $criteria, array $orderBy = null)
 * @method FormuleDeJeu[]    findAll()
 * @method FormuleDeJeu[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FormuleDeJeuRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FormuleDeJeu::class);
    }

//    /**
//     * @return FormuleDeJeu[] Returns an array of FormuleDeJeu objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('f')
//            ->andWhere('f.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('f.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?FormuleDeJeu
//    {
//        return $this->createQueryBuilder('f')
//            ->andWhere('f.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
