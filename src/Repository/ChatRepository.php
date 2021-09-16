<?php

namespace App\Repository;

use App\Classe\Search;
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
       return $this->createQueryBuilder('c')
       ->orderBy('c.id', 'DESC')
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
        return $this->createQueryBuilder('c')
            ->where(':categorie MEMBER OF c.categorie')
            ->andWhere('c.miseenavant= TRUE')
            ->setParameter('categorie',$categorie)
            ->getQuery()
            ->getResult()
            ;
    }

    /**
     * Requete qui permet de récuperer les chats en fonction de la recherche de l'utilisateur
     * @return Chat[]
     */
   public function findWithSearch (Search $search)
   {
        $query =$this
            ->createQueryBuilder('c')
            ->select('c', 'a')
            ->join('c.categorie','a');

        if(!empty($search->categories)){
            $query=$query
                ->andWhere('a.id IN (:categories)')
                ->setParameter('categories', $search->categories);
        }

       if(!empty($search->string)){
           $query=$query
               ->andWhere('c.nom LIKE :string')
               ->setParameter('string',"%{$search->string}%");
       }

        return $query->getQuery()->getResult();
   }

}
