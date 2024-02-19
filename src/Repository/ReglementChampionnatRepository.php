<?php

namespace App\Repository;

use App\Entity\ReglementChampionnat;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ReglementChampionnat>
 *
 * @method ReglementChampionnat|null find($id, $lockMode = null, $lockVersion = null)
 * @method ReglementChampionnat|null findOneBy(array $criteria, array $orderBy = null)
 * @method ReglementChampionnat[]    findAll()
 * @method ReglementChampionnat[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReglementChampionnatRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ReglementChampionnat::class);
    }

//    /**
//     * @return ReglementChampionnat[] Returns an array of ReglementChampionnat objects
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

//    public function findOneBySomeField($value): ?ReglementChampionnat
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
