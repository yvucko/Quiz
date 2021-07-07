<?php

namespace App\Controller\Admin;

use App\Entity\QuizName;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class QuizNameCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return QuizName::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [

            TextField::new(
                'name',
                'Nom'
            ),
            AssociationField::new(
                'quiz_categories',
                'Catégories'
            )->autocomplete()
        ];
    }
}
