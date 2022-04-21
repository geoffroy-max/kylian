<?php
namespace App\ServiceContact;

use App\Entity\Commentaire;
use App\Entity\Contact;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;

class ServiceContact {


   private $manager;

    public function __construct(EntityManagerInterface $manager){
   $this->manager = $manager;

    }

    /**
     * cette fonction permet de definir isSend et createdAt dns la bd
     * @param Contact $contact
     */
 public function PersistContact(Contact $contact){
  $datetime= new \Datetime('now');
        $contact->setIsSend(false)
              ->setCreatedAt($datetime);
        $this->manager->persist($contact);
        $this->manager->flush();

 }

    /**
     * cette fonction permet de mettre à jour isSend à true dns la bd(dfnir isSend à true dns bd)
     */
       public function isSend( Contact $contact){
     $contact->setIsSend(true);
     $this->manager->persist($contact);
     $this->manager->flush();

 }





}



