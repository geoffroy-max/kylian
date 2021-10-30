<?php

namespace App\Repository;

use App\Entity\Categorie;
use App\Entity\Peinture;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Peinture|null find($id, $lockMode = null, $lockVersion = null)
 * @method Peinture|null findOneBy(array $criteria, array $orderBy = null)
 * @method Peinture[]    findAll()
 * @method Peinture[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PeintureRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Peinture::class);
    }

      // cette fonction permet de recuperer les dernières peintures dans la bd

         public function LastTree(){
         return $this->createQueryBuilder('p')
             ->orderBy('p.id','DESC')
             ->setMaxResults(3)
             ->getQuery()
             ->getResult();

         }
         // cette fonction permet de recuperer toutes peinture dans la bd
     public function findAllPeinture(){
        return $this->createQueryBuilder('p')
              ->orderBy('p.id', 'ASC')
            ->setMaxResults(8)
                ->getQuery();
    }

    /**
     * cette fonction permet de recuperer les peintures avec ttes categories
     *  :on a ue reltion entre peinture et une categorie
     * comme la peinture peut avoir plus+ categorie on lui dit qu'il faut qu'il soit menbre de la categorie
     * qu'on va passé en paramtre(categorie dans ntre cas) cad qu'il soit menbre de tel grp
     * recuperer les peintures qui sont menbrs du grp cad d la categorie  qui est passé en parmtre
     * et on  recuperer les peintures qui ont uniquement le portfolio true
     */
    public function findAllPortfolio( $categorie){
       return $this->createQueryBuilder('p')
           ->where( ':categorie MEMBER OF p.categorie')
           ->andWhere('p.potfolio = TRUE')
           ->setParameter('categorie',$categorie)
            ->getQuery()
           ->getResult();
    }


    // /**
    //  * @return Peinture[] Returns an array of Peinture objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Peinture
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
