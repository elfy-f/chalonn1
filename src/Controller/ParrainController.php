<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ParrainController extends AbstractController
{

    private $entitymanager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entitymanager= $entityManager;
    }

    /**
     * @Route("/parrain", name="parrain")
     */
    public function index(): Response
    {
       $parrain= $this->entitymanager;

        return $this->render('parrain/index.html.twig', [
            'parrain'=>$parrain,
        ]);
    }
}
