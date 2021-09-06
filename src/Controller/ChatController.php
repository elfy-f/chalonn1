<?php

namespace App\Controller;

use App\Entity\Chat;
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
            $request->query->getInt('page',1),/*numero de page*/
            6 /*limite par page*/
        );



        return $this->render('chat/adoption.html.twig', [
            'chats' => $chats,
        ]);
    }

    /**
     * @Route ("/chats/{slug}", name="chat_details")
     */
    public function details(Chat $chat): Response
    {
        return  $this->render('chat/details.html.twig', [
            'chat'=>$chat
        ]);
    }


}

