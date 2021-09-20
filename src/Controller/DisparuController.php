<?php

namespace App\Controller;

use App\Entity\Disparu;
use App\Repository\DisparuRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DisparuController extends AbstractController
{
    private $entitymanager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entitymanager= $entityManager;
    }



    /**
     * @Route("/disparu", name="disparu")
     */
    public function index()
    {
        $disparus= $this->entitymanager->getRepository(Disparu::class)->findAll();

        return $this->render('disparu/index.html.twig', [
            'disparus' => $disparus
        ]);
    }
}
