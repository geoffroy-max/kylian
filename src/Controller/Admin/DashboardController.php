<?php

namespace App\Controller\Admin;

use App\Entity\BlogPost;
use App\Entity\Commentaire;
use App\Entity\Peinture;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * cette fonction permet d'afficher le dashboard
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return $this->render('admin/Dashboard.html.twig');
    }

    /** cette fonction permet de configure le dashboard
     * @return Dashboard
     */
    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Kylian');
    }

    /**
     * cette fonction permet d'afficher le lien lien vers le crud
     * @return iterable
     */
    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
         yield MenuItem::linkToCrud('Actualité', 'fas fa-newspaper', BlogPost::class);
        yield MenuItem::linkToCrud('peintures', 'fas fa-palette', Peinture::class);
        yield MenuItem::linkToCrud('paramètres', 'fas fa-cog', User::class);
        yield MenuItem::linkToCrud('commentaires', 'fas fa-comment', Commentaire::class);
    }
}
