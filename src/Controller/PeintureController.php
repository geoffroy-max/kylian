<?php

namespace App\Controller;

use App\Repository\PeintureRepository;


use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PeintureController extends AbstractController
{
    /**
     * cette fonction permet d'afficher toutes les peintures réaliseer
     * @Route("/realisation", name="realisations")
     */
    public function realisation(PeintureRepository $peintureRepo, PaginatorInterface $paginator, Request $request ): Response
    {
        $Dpeintures =$peintureRepo->findAllPeinture();
$peintures= $paginator->paginate($Dpeintures, $request->query->getInt('page',1),6);
        return $this->render('peinture/realisations.html.twig', [
            'peintures'=>$peintures
        ]);
    }

}
