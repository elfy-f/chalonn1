<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegisterType;
use App\Security\AppAuthenticator;
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
                              UserPasswordHasherInterface $passwordHasher,
                              UserAuthenticatorInterface $authenticator,
                             AppAuthenticator $appAuthenticator
                            ): Response
    {
        $user = new user();
        $user->setRoles(['ROLE_ADMIN']);
       $form = $this->createForm(RegisterType::class, $user);

        $form->handleRequest($request);

        if ($form -> isSubmitted() && $form->isValid()) {
           // $utilisateur=$form->getData();
                $user->setPassword(
                    $passwordHasher->hashPassword($user,
                    $form->get('password')->getData()
                    )
                );

            $entityManager = $this->getDoctrine()->getManager();
           $entityManager->persist($user);
           $entityManager->flush();

           return $authenticator->authenticateUser(
               $user,
               $appAuthenticator,
               $request);
          /*  return $this->redirectToRoute('admin');*/
        }



        return $this->render('register/index.html.twig',[
            'registrationForm'=>$form->createView()
        ]);
    }
}

