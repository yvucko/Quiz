<?php

namespace App\Controller\Admin;

use App\Entity\QuizAnswers;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;

class QuizAnswersCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return QuizAnswers::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new(
                'quizQuestions',
                'Question'
            ),
            TextField::new(
                'name',
                'Réponse'
            ),

            IntegerField::new(
                'expectedAnswer',
                'Réponse attendue'
            ),
        ];
    }
}
