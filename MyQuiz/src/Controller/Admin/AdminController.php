<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Form\CategoriesType;
use App\Entity\QuizCategorie;
use App\Entity\QuizName;
use App\Form\NameType;
use App\Form\QuestionsType;
use App\Entity\QuizQuestions;
use App\Form\AnswersType;
use App\Entity\QuizAnswers;

class AdminController extends AbstractController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }
}
