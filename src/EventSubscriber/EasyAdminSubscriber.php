<?php
namespace App\EventSubscriber;

use App\Entity\BlogPost;
use App\Entity\Peinture;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\String\Slugger\SluggerInterface;

class EasyAdminSubscriber implements EventSubscriberInterface
{

    private $security;


    public function __construct(Security $security)
    {
        $this->security = $security;

    }

    /**
     * cette fonction permet d'abonnée aux event
     * (abonné à tous events des entités )
     * cad écouté des events, tu d'abonne au BeforeEntityPersistedEvent
     * ( cad tu vas allé ecouter les Events avant l entité soit persité)et tu vas lui envoyé ue fnction
     * pr definir le user,date (concernant le slug on a un champ slugfied qui genere auto le slug)
     *
     * @return \string[][]
     */
    public static function getSubscribedEvents()
    {

        return [
            BeforeEntityPersistedEvent::class => ['setDateAndUser'],
        ];
    }

    /**
     * cette fonction permet de recuperer les events avant d'etre persiter à la bd
     * pr definir slug date et user
     * @param BeforeEntityPersistedEvent $event
     */
    public function setDateAndUser(BeforeEntityPersistedEvent $event)
    {
        $entity = $event->getEntityInstance();

        if (($entity instanceof BlogPost)) {

            $dateNow = new \DateTime('now');
            $entity->setCreatedAt($dateNow);
            $user = $this->security->getUser();
            $entity->setUser1($user);
        }
        if (($entity instanceof Peinture)) {

            $dateNow = new \DateTime('now');
            $entity->setCreatedAt($dateNow);
            $user = $this->security->getUser();
            $entity->setUser($user);
        }
        return;
    }

}