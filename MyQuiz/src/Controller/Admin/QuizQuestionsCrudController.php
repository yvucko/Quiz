<?php

namespace App\Controller\Admin;

use App\Entity\QuizQuestions;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;

class QuizQuestionsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return QuizQuestions::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new(
                'name',
                'Questions'
            ),
            AssociationField::new(
                'quizName',
                'Quiz associé'
            )->autocomplete()
        ];
    }
}
