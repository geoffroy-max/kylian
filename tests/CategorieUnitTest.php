<?php

namespace App\Tests;

use App\Entity\Categorie;
use App\Entity\User;
use PHPUnit\Framework\TestCase;

class CategorieUnitTest extends TestCase
{
    public function testIsTrue(): void
    {
        $this->assertTrue(true);

        $categorie= new Categorie();
        $categorie->setnom('nom')
              ->setDescription('description')
               ->setSlug('slug');

        // cette methode assertTrue est utilsée pr affirmer si la valeur de l'assertion(ce que l'on shte affirmer)
        // est vrai ou non,cette assertion retournera vrai si la valeur d'assertion est vrai sinon non
        //en cas de vrai le test est affirmé ,a été reussi


        $this->assertTrue($categorie->getNom() === 'nom');
        $this->assertTrue($categorie->getDescription() === 'description');
        $this->assertTrue($categorie->getSlug() === 'slug');



    }
    public function testIsFalse()
    {
        $this->assertFalse(false);
        $categorie= new Categorie();
        $categorie->setnom('nom')
            ->setDescription('description')
            ->setSlug('slug');


        // cette methode assertFalse est utilsée pr affirmer si la valeur de l'assertion(ce que l'on shte affirmer)
        // est faux ou vrai,cette assertion retournera faux si la valeur d'assertion est faux sinon vrai
        //en cas de faux le test est affirmé ,a été reussi

        $this->assertFalse($categorie->getNom() === false);
        $this->assertFalse($categorie->getDescription() === false);
        $this->assertFalse($categorie->getSlug() === false);

    }
    public function testIsEmpty(){
        $this->assertEmpty(false);
        $categorie = new Categorie();
        // lorsque je ne defini rien je ne recupere rien

        $this->assertEmpty($categorie->getNom());
        $this->assertEmpty($categorie->getDescription());
        $this->assertEmpty($categorie->getSlug());




    }
}
