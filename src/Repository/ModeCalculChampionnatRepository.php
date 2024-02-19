<?php

namespace App\Repository;

use App\Entity\ModeCalculChampionnat;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ModeCalculChampionnat>
 *
 * @method ModeCalculChampionnat|null find($id, $lockMode = null, $lockVersion = null)
 * @method ModeCalculChampionnat|null findOneBy(array $criteria, array $orderBy = null)
 * @method ModeCalculChampionnat[]    findAll()
 * @method ModeCalculChampionnat[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ModeCalculChampionnatRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ModeCalculChampionnat::class);
    }

//    /**
//     * @return ModeCalculChampionnat[] Returns an array of ModeCalculChampionnat objects
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

//    public function findOneBySomeField($value): ?ModeCalculChampionnat
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
