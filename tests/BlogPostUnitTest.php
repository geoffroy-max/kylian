<?php

namespace App\Tests;

use App\Entity\BlogPost;
use App\Entity\Categorie;
use PHPUnit\Framework\TestCase;

class BlogPostUnitTest extends TestCase
{
    public function testIsTrue(): void
    {
        $this->assertTrue(true);
        $blogpost = new BlogPost();
        $datetime = new \DateTime();
        $blogpost->setTitre('titre')
                  ->setContenu('contenu')
                  ->setSlug('slug')
                   ->setCreatedAt($datetime);





        // cette methode assertTrue est utilsée pr affirmer si la valeur de l'assertion(ce que l'on shte affirmer)
        // est vrai ou non,cette assertion retournera vrai si la valeur d'assertion est vrai sinon non
        //en cas de vrai le test est affirmé ,a été reussi


        $this->assertTrue($blogpost->getTitre() === 'titre');
        $this->assertTrue($blogpost->getContenu() === 'contenu');
        $this->assertTrue($blogpost->getSlug() === 'slug');
        $this->assertTrue($blogpost->getCreatedAt()=== $datetime);



    }
    public function testIsFalse()
    {
        $this->assertFalse(false);
        $blogpost = new BlogPost();
        $datetime = new \DateTime();
        $blogpost->setTitre('titre')
            ->setContenu('contenu')
            ->setSlug('slug')
            ->setCreatedAt($datetime);




        // cette methode assertFalse est utilsée pr affirmer si la valeur de l'assertion(ce que l'on shte affirmer)
        // est faux ou vrai,cette assertion retournera faux si la valeur d'assertion est faux sinon vrai
        //en cas de faux le test est affirmé ,a été reussi

        $this->assertFalse($blogpost->getTitre() === false);
        $this->assertFalse($blogpost->getContenu() === false);
        $this->assertFalse($blogpost->getSlug() === false);
        $this->assertFalse($blogpost->getCreatedAt() === new \DateTime());

    }
    public function testIsEmpty(){


        $blogpost = new BlogPost();



        $this->assertEmpty($blogpost->getTitre());
        $this->assertEmpty($blogpost->getContenu());
        $this->assertEmpty($blogpost->getSlug());
        $this->assertEmpty($blogpost->getCreatedAt());



    }
}
