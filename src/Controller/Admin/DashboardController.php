<?php

namespace App\Controller\Admin;

use App\Entity\Blogpost;
use App\Entity\Categorie;
use App\Entity\Chat;
use App\Entity\Commentaire;
use App\Entity\Disparu;
use App\Entity\Carroussel;
use App\Entity\Libre;
use App\Entity\Photo;
use App\Entity\User;
use App\Entity\Utilisateur;
use App\Form\RegisterType;
use App\Security\AppAuthenticator;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\UserAuthenticatorInterface;


class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Association Chalonn');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Actualité', 'fas fa-newspaper', Blogpost::class);
        yield MenuItem::linkToCrud('Chat', 'fas fa-cat', Chat::class);
        yield MenuItem::linkToCrud('Categorie', 'fas fa-list', Categorie::class);
        yield MenuItem::linkToCrud('Disparu', 'fas fa-cross', Disparu::class);
        yield MenuItem::linkToCrud('Libre', 'fas fa-paw', Libre::class);
        yield MenuItem::linkToCrud('Commentaire', 'fas fa-comment', Commentaire::class);
        yield MenuItem::linkToCrud('Paramètre', 'fas fa-cog', User::class);
       // yield MenuItem::linkToCrud('Donnateur', 'fas fa-smile-beam', Utilisateur::class);

    }


}
