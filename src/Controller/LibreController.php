<?php

namespace App\Controller;

use App\Entity\Libre;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LibreController extends AbstractController
{
    private $entitymanager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entitymanager= $entityManager;
    }

    /**
     * @Route("/libre", name="libre")
     */
    public function index(): Response
    {
        $libres= $this->entitymanager->getRepository(Libre::class)->findAll();

        return $this->render('libre/index.html.twig', [
            'libres' => $libres,
        ]);
    }
}
