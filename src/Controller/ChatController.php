<?php

namespace App\Controller;

use App\Classe\Search;
use App\Entity\Chat;
use App\Entity\Commentaire;
use App\Form\ChatType;
use App\Form\CommentaireType;
use App\Form\SearchType;
use App\Repository\ChatRepository;
use App\Repository\CommentaireRepository;
use App\Service\CommentaireService;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ChatController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager=$entityManager;
    }
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
        $chats= $this->entityManager->getRepository(Chat::class)->findAll();
        $search = new Search();
        $form =$this->createForm(SearchType::class, $search);


        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
           $chats =  $this->entityManager->getRepository(Chat::class)->findWithSearch($search);
        }

        return $this->render('chat/adoption.html.twig', [
            'chats' => $chats,
            'form'=> $form->createView()
        ]);
    }

    /**
     * @Route ("/chats/{nom}", name="chat_details")
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

            return  $this->redirectToRoute('chat_details', ['nom'=> $chat->getNom()]);
        }


        return  $this->render('chat/details.html.twig', [

            'chat'=>$chat,
            'form'=>$form->createView(),
            'commentaires'=>$commentaires,
        ]);


    }

}

