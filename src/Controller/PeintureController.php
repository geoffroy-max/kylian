<?php

namespace App\Controller;

use App\CommentaireService\CommentaireService;
use App\Entity\Commentaire;
use App\Entity\Peinture;
use App\Form\CommentaireType;
use App\Repository\CommentaireRepository;
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

    /**
     * une fonction qui permet de connaitre le detail sur realisation de la peinture
     * @Route("realisation/{slug}", name="detail-realisation")
     */
    public function detailActualite(Peinture $peinture, CommentaireService $commentaireService,Request $request,CommentaireRepository $commentaireRepository){
        $commentaires = $commentaireRepository->findCommentaires($peinture);
        $commentaire = new Commentaire();
        $form = $this->createForm(CommentaireType::class, $commentaire);
        $form->handleRequest($request);
        if($form->isSubmitted()&& $form->isValid()){
            $form= $form->getData();
            $commentaireService->PersistCommentaire($commentaire,null,$peinture);
            $this->addFlash('success', 'votre commentaires à été envoyé , merci il sera publié apres validation');
            return $this->redirectToRoute('detail-realisation',['slug'=>$peinture->getSlug()]);
        }

        return $this->render('peinture/detail.html.twig',[
            'peinture'=> $peinture,
            'form'=>$form->createView(),
            'commentaires'=>$commentaires,
        ]);
    }
}
