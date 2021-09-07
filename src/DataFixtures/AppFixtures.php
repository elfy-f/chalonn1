<?php

namespace App\DataFixtures;

use App\Entity\Blogpost;
use App\Entity\Categorie;
use App\Entity\Chat;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture

    {
        private $encoder;

        public function __construct(UserPasswordEncoderInterface  $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        // Utilisation de Faker
        $faker = Factory::create('fr_FR');

        //Création d'un utilisateur
        $user = new User();

        $user->setEmail('user@test.com')
            ->setPrenom($faker->firstName())
            ->setNom($faker->lastName())
            ->setAPropos($faker->text())
            ->setForum('Forum')
            ->setInstagram('Instagramm')
            ->setRoles(['ROLE_ADMIN']);

        $password = $this->encoder ->encodePassword($user, 'password');
        $user->setPassword($password);

        $manager->persist($user);

        //création de 10 Blogpost
        for ($i=0; $i<10; $i++) {
            $blogpost= new Blogpost();

            $blogpost->setTitre((string)$faker->words(3, true))

                ->setContenu($faker->text(250))
                ->setSlug($faker->slug(3))
                ->setUser($user);

                $manager->persist($blogpost);


                //Création de 5 catégories

            for ($k=0; $k<5; $k++){
                $categorie = new Categorie();

                $categorie->setNom($faker->word())
                    ->setDescription($faker->word(10,true))
                    ->setSlug($faker->slug());
                $manager->persist($categorie);

                //création de 2 Chatd/categorie

                for ($j=0; $j<2; $j++){
                    $chat =new Chat();

                    $chat->setNom($faker->word(3, true))
                       // ->setDateNaissance($faker->dateTimeBetween('12 years', 'now'))
                        ->setCaractere($faker->text())
                        ->setHistoire($faker->text())
                        ->setSexe($faker->randomElement(['male','femelle']))
                        ->setSterelise($faker->randomElement(['oui', 'non']))
                        ->setTestFelv($faker->randomElement(['non teste','oui','non']))
                        ->setTestFiv($faker->randomElement(['non teste','oui','non']))
                        ->setSlug($faker->slug())
                        ->setContact($faker->text())
                        ->setPelage($faker->text())
                        ->setRace($faker->text())
                        ->setPortfolio($faker->randomElement([true, false]))
                        ->setFrais($faker->randomFloat(2,100, 200))
                        ->setFile('/img/violette2.jpg')
                        ->addCategorie(($categorie))
                        ->setUser($user);
                        

                    $manager->persist($chat);
                }
            }




        }



        $manager->flush();
    }
}


