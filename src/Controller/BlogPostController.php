<?php

namespace App\Controller;

use App\CommentaireService\CommentaireService;
use App\Entity\BlogPost;
use App\Entity\Commentaire;
use App\Form\CommentaireType;
use App\Repository\BlogPostRepository;
use App\Repository\CommentaireRepository;
use App\Repository\PeintureRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BlogPostController extends AbstractController
{
    /**
     * cette fonction permet d'afficher ttes les actualités
     * @Route("/actualité", name="actualités")
     */
    public function actualite(BlogPostRepository $brpo, PaginatorInterface $paginator ,Request $request): Response
    {

        $blogposts1= $brpo->FindAllAct();
        $blogposts = $paginator->paginate($blogposts1, $request->query->getInt('page',1), 6 );

        return $this->render('blog_post/actualité.html.twig', [
            'blogposts'=>$blogposts
        ]);
    }

    /**
     * cette fonction permet de connaitre les details d'une actualité
     * @Route("/actualité/{slug}", name="actualité_detail")
     */
    public function DetailA(BlogPost $blogPost,Request $request,CommentaireService $commentaireService, CommentaireRepository $commentaireRepository){
          $commentaires= $commentaireRepository->findCommentaires($blogPost);
        $commentaire= new Commentaire();
        $form= $this->createForm(CommentaireType::class, $commentaire);
        $form->handleRequest($request);
        if($form->isSubmitted()&& $form->isValid()){
            $form= $form->getdata();
            $commentaireService->PersistCommentaire($commentaire,$blogPost,null);
            $this->addFlash('success','votre commentaires à été envoyé , merci il sera publié apres validation');
            return $this->redirectToRoute('actualité_detail',['slug'=> $blogPost->getSlug()]);

        }
        return $this->render('blog_post/detail.html.twig',[
            'blogpost'=>$blogPost,
            'form'=>$form->createView(),
            'commentaires' => $commentaires,
        ]);
    }
}
