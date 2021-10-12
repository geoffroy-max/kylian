<?php

namespace App\Tests;

use App\Entity\Categorie;
use App\Entity\Peinture;
use App\Entity\User;
use PHPUnit\Framework\TestCase;

class PeintureUnitTest extends TestCase
{
    public function testIsTrue(): void
    {
        $this->assertTrue(true);
        $categorie= new Categorie();
            $user= new User();
            $peinture= new Peinture();
            $datetime = new \DateTime();

        $peinture->setNom('nom')
                 ->setLargeur(20.20)
                  ->setHauteur(20.20)
                  ->setEnVente(true)
              ->setPrix(20.20)
                ->setDateRealisation($datetime)
             ->setCreatedAt($datetime)
              ->setDescription('description')
              ->setPotfolio(true)
            ->setSlug('slug')
            ->setFile('file')
            ->addCategorie($categorie)
              ->setUser($user);



        // cette methode assertTrue est utilsée pr affirmer si la valeur de l'assertion(ce que l'on shte affirmer)
        // est vrai ou non,cette assertion retournera vrai si la valeur d'assertion est vrai sinon non
        //en cas de vrai le test est affirmé ,a été reussi. aseertcontains est utlilisée pour affirmer si un tableau contien des valeur
        // cette assertion retounrera vrai dans le cas le tableau contient une vrai sinon non dns le cas de vrai le test affirmé a été reussi


        $this->assertTrue($peinture->getNom() === 'nom');
        $this->assertTrue($peinture->getLargeur() == 20.20);
        $this->assertTrue($peinture->getHauteur() == 20.20);
        $this->assertTrue($peinture->getEnVente() === true);
        $this->assertTrue($peinture->getDateRealisation() === $datetime);
        $this->assertTrue($peinture->getCreatedAt() === $datetime);
        $this->assertTrue($peinture->getDescription() === 'description');
        $this->assertTrue($peinture->getPotfolio() === true);
        $this->assertTrue($peinture->getSlug() === 'slug');
        $this->assertTrue($peinture->getfile() === 'file');
        $this->assertTrue($peinture->getprix() == 20.20);
        $this->assertContains($categorie ,$peinture->getCategorie());
        $this->assertTrue($peinture->getUser() === $user);



    }
    public function testIsFalse()
    {
        $this->assertFalse(false);
        $categorie= new Categorie();
        $user= new User();
        $peinture= new Peinture();
        $datetime = new \DateTime();

        $peinture->setNom('nom')
            ->setLargeur(20.20)
            ->setHauteur(20.20)
            ->setEnVente(true)
            ->setPrix(20.20)
            ->setDateRealisation($datetime)
            ->setCreatedAt($datetime)
            ->setDescription('description')
            ->setPotfolio(true)
            ->setSlug('slug')
            ->setFile('file')
            ->addCategorie($categorie)
            ->setUser($user);


        // cette methode assertFalse est utilsée pr affirmer si la valeur de l'assertion(ce que l'on shte affirmer)
        // est faux ou vrai,cette assertion retournera faux si la valeur d'assertion est faux sinon vrai
        //en cas de faux le test est affirmé ,a été reussi

        $this->assertFalse($peinture->getNom() === 'prenom');
        $this->assertFalse($peinture->getLargeur() == 20.21);
        $this->assertFalse($peinture->getHauteur() == 20.21);
        $this->assertFalse($peinture->getEnVente() === false);
        $this->assertFalse($peinture->getDateRealisation() === new \Datetime());
        $this->assertFalse($peinture->getCreatedAt() === new \Datetime());
        $this->assertFalse($peinture->getDescription() === 'false');
        $this->assertFalse($peinture->getPotfolio() === 'false');
        $this->assertFalse($peinture->getSlug() === 'false');
        $this->assertFalse($peinture->getfile() === 'false');
        $this->assertFalse($peinture->getprix() == 20.21);
        $this->assertNotContains(  new Categorie ,$peinture->getCategorie());
        $this->assertFalse($peinture->getUser() === new User);

    }
    public function testIsEmpty(){
        $this->assertEmpty(false);
        $categorie = new Categorie();
        $user = new User();
        $peinture = new Peinture();
        $datetime = new \DateTime();
        // lorsque je ne defini rien je ne recupere rien

        $this->assertEmpty($peinture->getNom()) ;
        $this->assertEmpty($peinture->getLargeur());
        $this->assertEmpty($peinture->getHauteur());
        $this->assertEmpty($peinture->getEnVente() );
        $this->assertEmpty($peinture->getDateRealisation());
        $this->assertEmpty($peinture->getCreatedAt());
        $this->assertEmpty($peinture->getDescription() );
        $this->assertEmpty($peinture->getPotfolio() );
        $this->assertEmpty($peinture->getSlug() );
        $this->assertEmpty($peinture->getfile() );
        $this->assertEmpty($peinture->getprix() );
        $this->assertEmpty($peinture->getCategorie());
        $this->assertEmpty($peinture->getUser() );



    }

}
