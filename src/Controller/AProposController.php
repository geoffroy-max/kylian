<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AProposController extends AbstractController
{
    /**
     * une fonction qui permet de presenter le peintre
     * @Route("/a_propos", name="a_propos")
     */
    public function index(UserRepository $useRpo): Response
    {
        return $this->render('a_propos/index.html.twig', [
        'peintre'=>$useRpo->getPeintre()
        ]);
    }
}
