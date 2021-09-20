<?php

namespace App\Repository;

use App\Entity\Disparu;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Disparu|null find($id, $lockMode = null, $lockVersion = null)
 * @method Disparu|null findOneBy(array $criteria, array $orderBy = null)
 * @method Disparu[]    findAll()
 * @method Disparu[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DisparuRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Disparu::class);
    }

    // /**
    //  * @return Disparu[] Returns an array of Disparu objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Disparu
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
