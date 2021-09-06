<?php

namespace App\Repository;

use App\Entity\Categorie;
use App\Entity\Chat;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Chat|null find($id, $lockMode = null, $lockVersion = null)
 * @method Chat|null findOneBy(array $criteria, array $orderBy = null)
 * @method Chat[]    findAll()
 * @method Chat[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ChatRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Chat::class);
    }

    /**
     * @return Chat[] Returns an array of Chat objects
     */

    public function lastThree()
    {
       return $this->createQueryBuilder('p')
       ->orderBy('p.id', 'DESC')
       ->setMaxResults(3)
       ->getQuery()
       ->getResult()
       ;
    }


    /**
     * @return Chat[] Returns an array of Chat objects
     */

    public function findAllMiseenavant(Categorie $categorie): array
    {
        return $this->createQueryBuilder('p')
            ->where(':categorie MEMBER OF p.categorie')
            ->andWhere('p.miseenavant= TRUE')
            ->setParameter('categorie',$categorie)
            ->getQuery()
            ->getResult()
            ;
    }

    // /**
    //  * @return Chat[] Returns an array of Chat objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Chat
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
    public function findAllPortfolio(Categorie $categorie)
    {
    }
}
