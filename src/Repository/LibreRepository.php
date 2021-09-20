<?php

namespace App\Repository;

use App\Entity\Libre;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Libre|null find($id, $lockMode = null, $lockVersion = null)
 * @method Libre|null findOneBy(array $criteria, array $orderBy = null)
 * @method Libre[]    findAll()
 * @method Libre[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LibreRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Libre::class);
    }

    // /**
    //  * @return Libre[] Returns an array of Libre objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Libre
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
