<?php

namespace App\Repository;

use App\Entity\Blogpost;
use App\Entity\Chat;
use App\Entity\Commentaire;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Commentaire|null find($id, $lockMode = null, $lockVersion = null)
 * @method Commentaire|null findOneBy(array $criteria, array $orderBy = null)
 * @method Commentaire[]    findAll()
 * @method Commentaire[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CommentaireRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Commentaire::class);
    }

    public function findCommentaires($value)
    {
        if ($value instanceof Blogpost) {
            $object = 'blogpost';
        }

        if ($value instanceof Chat){
            $object = 'chat';
        }

        return $this->createQueryBuilder('o')
           ->andWhere('o.' .$object . '= :val')
            ->andWhere('o.isPublished= true')
           ->setParameter('val', $value->getId())
            ->orderBy('o.id', 'DESC')
            ->getQuery()
            ->getResult()
            ;
    }

}

