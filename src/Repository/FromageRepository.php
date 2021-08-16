<?php

namespace App\Repository;

use App\Entity\Fromage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Fromage|null find($id, $lockMode = null, $lockVersion = null)
 * @method Fromage|null findOneBy(array $criteria, array $orderBy = null)
 * @method Fromage[]    findAll()
 * @method Fromage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FromageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Fromage::class);
    }

    // /**
    //  * @return Fromage[] Returns an array of Fromage objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Fromage
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
