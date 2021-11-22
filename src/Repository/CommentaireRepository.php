<?php

namespace App\Repository;

use App\Entity\BlogPost;
use App\Entity\Commentaire;
use App\Entity\Peinture;
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

    /**
     * cette fonction permet de recuperer tous les commentaires du blogpost et peintures
     * @param $value
     * @return \Doctrine\ORM\QueryBuilder
     */
           public function findCommentaires($value){
              //si la $value  qui est dans le parametre est l'instance de l'entité blogpost dans
               //// ce cas on stocke cette valeur  dns la variable objet
               // pour pouvoir l'utiliser dans la notre requette createQueryBuilde
        if($value instanceof Blogpost){
            $objet= 'blogpost';
        }
        if($value instanceof Peinture){
            $objet= 'peinture';
        }
            // si l'objet=val(la valeur qui est passée en parametre)
               // on recuperer l'id de cette valeur cad les com d cette vleur
               // si c.ispublished= true on publie le com
        return $this->createQueryBuilder('c')
            ->andWhere('c.' . $objet . ' = :val')
             ->andWhere('c.isPublished = true')
              ->setParameter('val', $value->getId())
              ->orderBy('c.id', 'DESC')
              ->getQuery()
              ->getResult();


            }
    // /**
    //  * @return Commentaire[] Returns an array of Commentaire objects
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
    public function findOneBySomeField($value): ?Commentaire
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
