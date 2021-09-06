<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Repository\CategorieRepository;
use App\Repository\ChatRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PortfolioController extends AbstractController
{
    /**
     * @Route("/ChatAdoption", name="portfolio")
     */
    public function index(CategorieRepository $categorieRepository): Response
    {
        return $this->render('portfolio/ChatAdoption.html.twig', [
            'categories' => $categorieRepository->findAll(),
        ]);
    }

    /**
     * @Route ("/ChatAdoption/{slug}",name="portfolio_categorie")
     */
    public function categorie(Categorie $categorie, ChatRepository $chatRepository):Response
    {
        $chats = $chatRepository->findAllPortfolio($categorie);

        return $this->render('portfolio/categorie.html.twig',[
            'categorie'=>$categorie,
            'chats' =>$chats,
        ]);
    }
}
