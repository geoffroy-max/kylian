<?php

namespace App\Tests;

use App\Entity\BlogPost;
use App\Entity\Categorie;
use App\Entity\Commentaire;
use App\Entity\Peinture;
use PHPUnit\Framework\TestCase;

class CommentaireUnitTest extends TestCase
{
    public function testIsTrue(): void
    {
        $this->assertTrue(true);

        $commentaire = new Commentaire();
        $blogpost = new BlogPost();
        $peinture = new Peinture();
        $datetime = new \DateTime();

        $commentaire->setAuteur('auteur')
            ->setEmail('nono@yahoo.com')
            ->setContenu('contenu')
            ->setCreatedAt($datetime)
            ->setBlogpost($blogpost)
            ->setPeinture($peinture);

        // cette methode assertTrue est utilsée pr affirmer si la valeur de l'assertion(ce que l'on shte affirmer)
        // est vrai ou non,cette assertion retournera vrai si la valeur d'assertion est vrai sinon non
        //en cas de vrai le test est affirmé ,a été reussi


        $this->assertTrue($commentaire->getAuteur() === 'auteur');
        $this->assertTrue($commentaire->getEmail() === 'nono@yahoo.com');
        $this->assertTrue($commentaire->getContenu() === 'contenu');
        $this->assertTrue($commentaire->getCreatedAt() === $datetime);
        $this->assertTrue($commentaire->getBlogpost() === $blogpost);
        $this->assertTrue($commentaire->getPeinture() === $peinture);




        $commentaire = new Commentaire();
        $blogpost = new BlogPost();
        $peinture = new Peinture();
        $datetime = new \DateTime();

        $commentaire->setAuteur('auteur')
            ->setEmail('nono@yahoo.com')
            ->setContenu('contenu')
            ->setCreatedAt($datetime)
            ->setBlogpost($blogpost)
            ->setPeinture($peinture);



    }
    public function testIsFalse()
    {
        $this->assertFalse(false);
        $commentaire = new Commentaire();
        $blogpost = new BlogPost();
        $peinture = new Peinture();
        $datetime = new \DateTime();

        $commentaire->setAuteur('auteur')
            ->setEmail('nono@yahoo.com')
            ->setContenu('contenu')
             ->setCreatedAt($datetime)
            ->setBlogpost($blogpost)
            ->setPeinture($peinture);


        // cette methode assertFalse est utilsée pr affirmer si la valeur de l'assertion(ce que l'on shte affirmer)
        // est faux ou vrai,cette assertion retournera faux si la valeur d'assertion est faux sinon vrai
        //en cas de faux le test est affirmé ,a été reussi

        $this->assertFalse($commentaire->getAuteur() === 'false');
        $this->assertFalse($commentaire->getEmail() === 'nano@yahoo.com');
        $this->assertFalse($commentaire->getContenu() === 'false');
        $this->assertFalse($commentaire->getCreatedAt() === new \DateTime());
        $this->assertFalse($commentaire->getBlogpost() === new blogpost);
        $this->assertFalse($commentaire->getPeinture() === new peinture);

    }
    public function testIsEmpty(){
        $this->assertEmpty(false);
        $commentaire = new Commentaire();
        $blogpost = new BlogPost();
        $peinture = new Peinture();
        $datetime = new \DateTime();

        // lorsque je ne defini rien je ne recupere rien


        $this->assertEmpty($commentaire->getAuteur() );
        $this->assertEmpty($commentaire->getEmail() );
        $this->assertEmpty($commentaire->getContenu());
        $this->assertempty($commentaire->getCreatedAt());
        $this->assertempty($commentaire->getBlogpost());
        $this->assertempty($commentaire->getPeinture());
    }
}
