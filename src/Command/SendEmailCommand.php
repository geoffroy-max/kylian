<?php

namespace App\Command;

use App\Repository\CategorieRepository;
use App\Repository\ContactRepository;
use App\Repository\UserRepository;
use App\ServiceContact\ServiceContact;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Address;
use Symfony\Component\Mime\Email;

class SendEmailCommand extends Command
{
    private $contactRepository;
    private $userRepository;
    private $mailer;
    private $servicecontact;
    protected static $defaultName = 'app:send-contact';
    protected static $defaultDescription = 'créer une command pour envoyer des mails';

    public function __construct(ContactRepository $contactRepository,MailerInterface $mailer,UserRepository $userRepository,ServiceContact $serviceContact)
    {
        $this->contactRepository = $contactRepository;
        $this->userRepository = $userRepository;
        $this->mailer = $mailer;
        $this->servicecontact = $serviceContact;

        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->addArgument('arg1', InputArgument::OPTIONAL, 'Argument description')
            ->addOption('option1', null, InputOption::VALUE_NONE, 'Option description')
        ;
    }

    /**
     * cette fonction permet d'excuter automatiquement lorsqu'on tape la command
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int
     */
    protected function execute(InputInterface $input, OutputInterface $output): int

  // findby  elle permet de retourner une liste d'entités,
        // sauf qu'elle est capable d'effectuer un filtre
        // pour ne retourner que les entités correspondant à un critère.
    { $tosend = $this->contactRepository->findBy(['isSend'=>false]);
        $adress = new Address($this->userRepository->getPeintre()->getEmail(),$this->userRepository->getPeintre()->getNom().''. $this->userRepository->getPeintre()->getPrenom());
 foreach ($tosend as $mail)
    $email = (new Email())
           ->from($mail->getEmail())
            ->to($adress)
            ->subject('Nouveau message ' . $mail->getNom() )
             ->text($mail->getMessage());
           $this->mailer->send($email);
           $this->servicecontact->isSend($mail);



        return Command::SUCCESS;

    }
}
