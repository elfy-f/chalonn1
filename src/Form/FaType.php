<?php

namespace App\Form;

use App\Entity\Utilisateur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;

class FaType extends AbstractType
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
                    'max'=> 30
                ]),
                'attr'=>[
                    'placeholder'=> 'Merci de saisir votre email'
                ]
            ])

            ->add('adresse',TextType::class,[
                'label'=> 'Votre adresse',
                'constraints'=> new Length([
                    'min' => 2,
                    'max'=> 100
                ]),
                'attr'=>[
                    'placeholder'=> 'Merci de saisir votre adresse'
                ]
            ])

            ->add('Cp',TextType::class,[
                'label'=> 'Code Postal',
                'constraints'=> new Length([
                    'min' => 5,
                    'max'=> 5]),
                     'attr'=>[
        'placeholder'=> 'Merci de saisir votre code postal'
    ]
                ])


            ->add('ville',TextType::class,[
                'label'=> 'ville',
                'constraints'=> new Length([
                    'min' => 2,
                    'max'=> 100
                ]),
                'attr'=>[
                    'placeholder'=> 'Merci de saisir votre ville'
                ]
            ])


        ->add('telephone',IntegerType::class,[
        'label'=> 'Votre numéro de téléphone',
        'constraints'=> new Length([
            'min' => 10,
            'max'=> 10
        ]),
        'attr'=>[
            'placeholder'=> 'Merci de saisir votre numéro de téléphone'
        ]
    ])

            ->add('accueil',TextareaType::class,[
                'label'=> "Condition d'accueil ( préciser votre lieu d'acceuil, appartement, étage, balcon sécurisé ou non, maison, jardin clos ou non, superficie….) ",
                'required'=> true,
                'attr'=>[
                    'placeholder'=> 'Merci de saisir ici'
                ]
            ])

            ->add('nb',TextType::class,[
                'label'=> 'Combien de chats pouvez-vous accueillir ',
                'required'=> true
            ])

            ->add('animaux',TextareaType::class,[
                'label'=> "Combien d'animaux avez vous à la maison?" ,
                'required'=> true,
                'attr'=>[
                    'placeholder'=> 'Merci de saisir ici'
                ]
            ])

            ->add('sterilise',ChoiceType::class,[
                'label'=> 'Sont-ils stérilisés? ',
                'choices'=>[
                    'oui'=>'oui',
                     'non'=>'non',]
        ])



            ->add('chat',ChoiceType::class,[
                'label'=> 'Sont t-ils vaccinés?',
                'choices'=>[
                    'non'=>'non',
                    'oui coryza, typhus'=>'oui coryza, typhus',
                    'oui coryza, typhus et leucose'=>'oui coryza, typhus et leucose',
                    ]
            ])

        ->add('quarantaine',ChoiceType::class,[
            'label'=> "Avez vous la possibilité d'isolé le chat pour une quarantaine? ",
            'choices'=>[
                'oui'=>'oui',
                'non'=>'non',]
        ])

        ->add('journee',TextType::class,[
            'label'=> 'La journée vous vous absentez combien de temps en moyenne? ',
            'required'=> true,
            'attr'=>[
                'placeholder'=> 'Merci de saisir ici'
            ]
        ])

        ->add('vacances',TextareaType::class,[
            'label'=> 'Si vous êtes amené à partir en vacances, ou seront les chats confiés?',
            'required'=> true,
            'attr'=>[
                'placeholder'=> 'Merci de saisir ici'
            ]
        ])

        ->add('libre',ChoiceType::class,[
            'label'=> 'Pouvez vous accueillir dés maintenant?',
            'choices'=>[
                'oui'=>'oui',
                'non'=>'non',]
        ])

        ->add('non',TextType::class,[
            'label'=> 'Si non, à partir de quand?',
                        'attr'=>[
                'placeholder'=> 'Merci de saisir ici'
            ]
        ])

        ->add('assurance',ChoiceType::class,[
            'label'=> 'Avez vous une assurance responsabilité civile',
            'choices'=>[
                'oui'=>'oui',
                'non'=>'non',
                ]
        ])

        ->add('veto',TextareaType::class,[
            'label'=> 'Avez vous un vétérinaire habituel? ',
            'required'=> true,
            'attr'=>[
                'placeholder'=> 'Merci de saisir ici'
            ]
        ])

        ->add('autre',TextareaType::class,[
            'label'=> 'Toutes autres informations qui vous semblent utiles ',
            'attr'=>[
                'placeholder'=> 'Merci de saisir ici'
            ]
        ])

            ->add('submit',SubmitType::class,[
            'label'=>'Valider'
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
