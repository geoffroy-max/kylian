<?php

namespace App\Controller;

use App\Repository\BlogPostRepository;
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
}
