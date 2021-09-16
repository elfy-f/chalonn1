<?php

namespace App\Controller;

use App\Entity\Utilisateur;
use App\Form\RegisterType;
use App\Security\AppAuthenticator;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\UserAuthenticatorInterface;


class RegisterController extends AbstractController
{
    /**
     * @Route("/inscription", name="register")
     */
    public function register (Request $request,
                              UserPasswordHasherInterface $passwordEncoder,
                              UserAuthenticatorInterface $authenticator,
                             AppAuthenticator $formAuthenticator
                            ): Response
    {
        $utilisateur = new Utilisateur();
        $form = $this->createForm(RegisterType::class, $utilisateur);

        $form->handleRequest($request);

        if ($form -> isSubmitted() && $form->isValid()) {
            $utilisateur=$form->getData();


            $entityManager = $this->getDoctrine()->getManager();
           $entityManager->persist($utilisateur);
           $entityManager->flush();

           return $authenticator->authenticateUser(
               $utilisateur,
               $formAuthenticator,
               $request);


        }

        return $this->render('register/index.html.twig',[
            'form'=>$form->createView()
        ]);
    }
}
