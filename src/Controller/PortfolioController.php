<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Repository\CategorieRepository;
use App\Repository\PeintureRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PortfolioController extends AbstractController
{
    /**
     * cette fonction permet d'afficher ttes les categories dans un dossier portfolio
     * @Route("/portfolio", name="portfolio")
     */
    public function index(CategorieRepository $categorieRepository): Response
    {
        $categories= $categorieRepository->findAll();
        return $this->render('portfolio/index.html.twig', [
            'categories'=>$categories
        ]);
    }
    /**
     * cette fonction permet de presenter une categorie avec une peinture
     * @Route("/categorie/{slug}", name="portfolio-categorie" ,requirements={"slug":"[a-z0-9\-]*"})
     */
    public function categorie( Categorie $categorie,$slug, PeintureRepository $peintureRepository){

$peintures = $peintureRepository->findAllPortfolio($categorie);
return $this->render('portfolio/categorie.html.twig',[
    'peintures'=>$peintures,
    'categorie'=>$categorie

]);
    }
}

