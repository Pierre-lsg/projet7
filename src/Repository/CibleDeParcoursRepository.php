<?php

namespace App\Repository;

use App\Entity\CibleDeParcours;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CibleDeParcours>
 *
 * @method CibleDeParcours|null find($id, $lockMode = null, $lockVersion = null)
 * @method CibleDeParcours|null findOneBy(array $criteria, array $orderBy = null)
 * @method CibleDeParcours[]    findAll()
 * @method CibleDeParcours[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CibleDeParcoursRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CibleDeParcours::class);
    }

//    /**
//     * @return CibleDeParcours[] Returns an array of CibleDeParcours objects
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

//    public function findOneBySomeField($value): ?CibleDeParcours
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
