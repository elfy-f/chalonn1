<?php

namespace App\Controller\Admin;

use App\Entity\Disparu;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class DisparuCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Disparu::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
           TextField::new('nom'),
            ImageField::new('image')
                ->setBasePath('uploads/disparu')
                ->setUploadDir('public/uploads/disparu')
                ->setUploadedFileNamePattern('[randomhash], [extension]')
                ->setRequired(false),
            TextareaField::new('histoire')->hideOnIndex(),
            SlugField::new('slug')->setTargetFieldName('nom')->hideOnIndex(),

        ];
    }

}
