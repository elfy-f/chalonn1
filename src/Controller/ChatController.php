<?php

namespace App\Controller;

use App\Repository\ChatRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ChatController extends AbstractController
{
    /**
     * @Route("/adoption", name="adoption")
     */
    public function adoption(
        ChatRepository $chatRepository,
        PaginatorInterface $paginator,
        Request $request
   ) : Response
    {
        $data = $chatRepository->findAll();

        $chats = $paginator->paginate(
            $data,
            $request->query->getInt('page',1),
            6
        );



        return $this->render('chat/adoption.html.twig', [
            'chats' => $chats,
        ]);
    }
}
