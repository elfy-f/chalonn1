<?php

namespace App\Controller;

use App\Entity\Chat;
use App\Entity\Commentaire;
use App\Form\CommentaireType;
use App\Repository\ChatRepository;
use App\Repository\CommentaireRepository;
use App\Service\CommentaireService;
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
        $data = $chatRepository->findby([], ['id'=> 'DESC']);

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
    public function details(
        Chat $chat,
         Request $request,
        CommentaireService $commentaireService,
         CommentaireRepository $commentaireRepository
    ): Response

    {
        $commentaires = $commentaireRepository->findCommentaires($chat);
        $commentaire = new Commentaire();
        $form = $this->createForm(CommentaireType::class, $commentaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $commentaire = $form->getData();
            $commentaireService->persistCommentaire($commentaire, null, $chat);

            return  $this->redirectToRoute('chat_details', ['slug'=> $chat->getSlug()]);
        }


        return  $this->render('chat/details.html.twig', [
            'chat'=>$chat,
            'form'=>$form->createView(),
            'commentaires'=>$commentaires,
        ]);
    }


}

