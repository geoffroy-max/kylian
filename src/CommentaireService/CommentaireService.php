<?php
namespace App\CommentaireService;

use App\Entity\BlogPost;
use App\Entity\Commentaire;
use App\Entity\Contact;
use App\Entity\Peinture;
use Doctrine\ORM\EntityManagerInterface;

class CommentaireService{


    private $manager;

    public function __construct(EntityManagerInterface $manager){
        $this->manager = $manager;

    }

    /**
     * cette fonction permet de traiter les commentaires, les persiter à la bd
     * @param Contact $contact
     */
    public function PersistCommentaire(Commentaire $commentaire, BlogPost $blogPost= null,Peinture $peinture=null)
    {
        $date= new \DateTime('now');
$commentaire->setIsPublished(false)
              ->setBlogpost($blogPost)
               ->setPeinture($peinture)
                ->setCreatedAt($date);

        $this->manager->persist($commentaire);
        $this->manager->flush();

    }


}



