<?php

namespace App\Controller\Admin;

use App\Entity\Chat;
use App\Form\MultipleType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ChatCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Chat::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
           TextField::new('nom'),
            DateField::new('dateNaissance'),
            TextField::new('sexe'),
            TextField::new('race'),
            TextField::new('pelage'),
            TextField::new('sterelise')->hideOnIndex(),
            TextField::new('testFiv')->hideOnIndex(),
            TextField::new('testFelv')->hideOnIndex(),
            TextareaField::new('histoire')->hideOnIndex(),
            TextareaField::new('caractere')->hideOnIndex(),
            TextField::new('contact'),
            NumberField::new('frais')->hideOnIndex(),
            SlugField::new('slug')->setTargetFieldName('nom')->hideOnIndex(),

             ImageField::new('file')
                 ->setBasePath('uploads/chats')
                ->setUploadDir('public/uploads/chats')
               ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setRequired(false),

            ImageField::new('image')
                ->setBasePath('uploads/chats')
                ->setUploadDir('public/uploads/chats')
               ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setRequired(false),

            ImageField::new('img')
                ->setBasePath('uploads/chats')
                ->setUploadDir('public/uploads/chats')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setRequired(false),


            AssociationField::new('categorie'),
            BooleanField::new('miseenavant'),
            BooleanField::new('reserve')

        ];
    }

    public function configureCrud(Crud $crud): Crud
    {
        return$crud
            ->setDefaultSort(['createdAt'=>'DESC']);
    }
}
