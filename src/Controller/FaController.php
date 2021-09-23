<?php

namespace App\Controller;

use App\Entity\Utilisateur;
use App\Form\FaType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FaController extends AbstractController
{
    /**
     * @Route("/fa", name="fa")
     */
    public function index(): Response
    {
        $utilisateur = new Utilisateur();
        $form = $this->createForm(FaType::class, $utilisateur);

        return $this->render('fa/index.html.twig',[
            'form' =>$form->createView()
            ]);
    }
}
