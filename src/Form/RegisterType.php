<?php

namespace App\Form;

use App\Entity\Utilisateur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder


            ->add('prenom', TextType::class,[
                'label'=> 'Votre prénom',
                'constraints'=> new Length([
                    'min' => 2,
                    'max'=> 30
                ]),
                'attr'=>[
                    'placeholder'=> 'Merci de saisir votre prénom'
                ]
            ])
            ->add('nom',TextType::class,[
        'label'=> 'Votre nom',
                'constraints'=> new Length([
                    'min' => 2,
                    'max'=> 30
                ]),
        'attr'=>[
            'placeholder'=> 'Merci de saisir votre nom'
        ]
    ])
            ->add('email', EmailType::class,[
                'label'=> 'Votre email',
                'constraints'=> new Length([
                    'min' => 2,
                    'max'=> 50
                ]),
                'attr'=>[
                    'placeholder'=> 'Merci de saisir votre email'
                ]
            ])
            ->add('password', RepeatedType::class,[
                'type'=>PasswordType::class,
                'invalid_message'=>'le mot de passe doit etre indentique',
                'label'=>'Votre mot de passe',
                'constraints'=> new Length([
                    'min' => 2,
                    'max'=> 30
                ]),
                'required'=> true,
                'first_options'=>[
                    'label'=>'mot de passe',
                    'attr'=>[
                        'placeholder'=>'Merci de saisir votre mot de passe'
                    ]
                ],
                'second_options'=>[
                    'label'=>'mot de passe',
                    'attr'=>[
                        'placeholder'=>'Merci de saisir à nouveau votre mot de passe'
                    ]
                ],
            ])

            ->add('submit', SubmitType::class,[
                'label'=> "S'inscrire"
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Utilisateur::class,
        ]);
    }
}
