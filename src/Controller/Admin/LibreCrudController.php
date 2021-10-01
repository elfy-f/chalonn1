<?php

namespace App\Controller\Admin;

use App\Entity\Libre;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Form\Filter\Type\BooleanFilterType;

class LibreCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Libre::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
           TextField::new('lieu'),
            ImageField::new('carte')
                ->setBasePath('uploads/disparu')
                ->setUploadDir('public/uploads/disparu')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setRequired(false),
            TextField::new('nombreChat'),
            TextareaField::new('histoire'),
            TextField::new('nourrice'),
            BooleanField::new('aide'),

        ];
    }

}
