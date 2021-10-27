<?php

namespace App\Controller;

use App\Repository\BlogPostRepository;
use App\Repository\PeintureRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * cette fonction permet d'afficher la page d'accueil
     * @Route("/", name="home")
     */
    public function index(PeintureRepository $peintureRepository,BlogPostRepository $bRpo): Response
    {
        return $this->render('home/index.html.twig', [
            'peintures'=>$peintureRepository->LastTree(),
            'blogposts'=>$bRpo->LasTree()
        ]);
    }
}
