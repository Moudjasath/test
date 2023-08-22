<?php

namespace App\Repository;

use App\Entity\SalleCours;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<SalleCours>
 *
 * @method SalleCours|null find($id, $lockMode = null, $lockVersion = null)
 * @method SalleCours|null findOneBy(array $criteria, array $orderBy = null)
 * @method SalleCours[]    findAll()
 * @method SalleCours[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SalleCoursRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SalleCours::class);
    }

//    /**
//     * @return SalleCours[] Returns an array of SalleCours objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?SalleCours
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
