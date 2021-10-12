<?php

namespace App\Tests;

use App\Entity\User;
use PHPUnit\Framework\TestCase;

class UserUnitTest extends TestCase
{
    public function testIsTrue(): void
    {
        $this->assertTrue(true);
        $user= new User();
        $user->setEmail('jojo@yahoo.com')
            ->setPrenom('jojo')
            ->setNom('nom')
            ->setApropos('a propos')
            ->setInstagramm('instagramm')
            ->setPassword('password');
       // cette methode assertTrue est utilsée pr affirmer si la valeur de l'assertion(ce que l'on shte affirmer)
        // est vrai ou non,cette assertion retournera vrai si la valeur d'assertion est vrai sinon non
        //en cas de vrai le test est affirmé ,a été reussi


        $this->assertTrue($user->getEmail() === 'jojo@yahoo.com');
        $this->assertTrue($user->getPrenom() === 'jojo');
        $this->assertTrue($user->getNom() === 'nom');
        $this->assertTrue($user->getPassword() === 'password');
        $this->assertTrue($user->getApropos() === 'a propos');
        $this->assertTrue($user->getInstagramm() === 'instagramm');


    }
    public function testIsFalse()
    {
        $this->assertFalse(false);
        $user= new User();
        $user->setEmail('jojo@yahoo.com')
            ->setPrenom('jojo')
            ->setNom('nom')
            ->setPassword('password')
            ->setApropos('a propos')
            ->setInstagramm('instagramm');


        // cette methode assertFalse est utilsée pr affirmer si la valeur de l'assertion(ce que l'on shte affirmer)
        // est faux ou vrai,cette assertion retournera faux si la valeur d'assertion est faux sinon vrai
        //en cas de faux le test est affirmé ,a été reussi

        $this->assertFalse($user->getEmail() === 'nono@yahoo.com');
        $this->assertFalse($user->getPrenom() === 'false');
        $this->assertFalse($user->getNom() === 'false');
        $this->assertFalse($user->getPassword() === 'false');
        $this->assertFalse($user->getApropos() === 'false');
        $this->assertFalse($user->getInstagramm() === 'false');

    }
     public function testIsEmpty(){
         $this->assertEmpty(false);
        $user = new User();
   // lorsque je ne defini rien je ne recupere rien

        $this->assertEmpty($user->getEmail());
         $this->assertEmpty($user->getPrenom());
         $this->assertEmpty($user->getNom());
         $this->assertEmpty($user->getPassword());
         $this->assertEmpty($user->getApropos());
         $this->assertEmpty($user->getInstagramm());


     }
}
