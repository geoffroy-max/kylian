<?php

namespace App\DataFixtures;

use App\Entity\BlogPost;
use App\Entity\Categorie;
use App\Entity\Peinture;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;



class AppFixtures extends Fixture
{


    private UserPasswordHasherInterface $hasher;

    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;

    }
    public function load(ObjectManager $manager)
    {
        // utilisation du faker
        $faker = Factory::create('fr_FR');
        // creation d'un utilisateur
        $user= new User();

        $user->setEmail('ndongogeoffroy10@yahoo.com')
               ->setPrenom($faker->firstName)
              ->setNom($faker->lastName)
            ->setTelephone($faker->phoneNumber)
              ->setApropos($faker->text);

$password= $this->hasher->hashPassword($user, 'kylian');
       $user->setPassword($password);
       $manager->persist($user);

       // creation de 10 blogpost
        for ($i=0; $i<10 ; $i++){

            $blogpost = new BlogPost();

            $blogpost->setTitre($faker->words(3, true))
                    ->setCreatedAt($faker->dateTimeBetween('-6month','now' ))
                ->setContenu($faker->text(350))
                ->setSlug($faker->slug)
                ->setUser1($user);

             $manager->persist($blogpost);
        }
           // creation de 5 categories
          for ($k=0; $k<5 ; $k++){

              $categorie= new Categorie();

              $categorie->setNom($faker->word())
                         ->setDescription($faker->sentences(3,true))
                         ->setSlug($faker->slug);

              $manager->persist($categorie);

            // creation de peinture/categorie cad deux p par Categorie
              for ($j=0; $j<2 ; $j++){
                  $peinture= new Peinture();

                  $peinture->setNom($faker->words(3, true))
                           ->setLargeur($faker->randomFloat(2,20,60))
                            ->setHauteur($faker->randomFloat(2,20,60))
                            ->setEnVente($faker->randomElement([true, false]))
                             ->setDateRealisation($faker->dateTimeBetween('-6month', 'now'))
                             ->setCreatedAt($faker->dateTimeBetween('-6month', 'now'))
                             ->setDescription($faker->text())
                              ->setPotfolio($faker->randomFloat([true,false]))
                              ->setSlug($faker->slug())
                              ->setFile('/img/place.jpg')
                               ->addCategorie($categorie)
                                ->setPrix($faker->randomFloat(2,100,9999))
                                ->setUser($user);
                            $manager->persist($peinture);
              }

        }


        $manager->flush();

    }
}
