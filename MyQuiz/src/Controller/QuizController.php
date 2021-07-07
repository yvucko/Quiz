<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\QuizName;
use App\Entity\QuizCategorie;

class QuizController extends AbstractController
{

    #[Route('/', name: 'home')]
    public function home()
    {
        $categorie = $this->getDoctrine()->getRepository(QuizCategorie::class)->findAll();

        return $this->render('quiz/home.html.twig', [
            'categorie' => $categorie
        ]);
    }

    #[Route('/quiz/categories', name: 'categories')]
    public function categorie()
    {
        $categorie = $this->getDoctrine()->getRepository(QuizCategorie::class)->findAll();

        return $this->render('quiz/quizcategorie.html.twig', [
            'categorie' => $categorie
        ]);
    }

    #[Route('/quiz/quizname/{id}', name: 'quizname')]
    public function quiz($id)
    {
        $quizname = $this->getDoctrine()->getRepository(QuizCategorie::class)->find($id);

        return $this->render('quiz/quizname.html.twig', [
            'quizname' => $quizname
        ]);
    }

    #[Route('/quiz/quizdetails/{id}', name: 'details')]
    public function quizDetails($id): Response
    {

        $quiz = $this->getDoctrine()->getRepository(QuizName::class)->find($id);

        return $this->render('quiz/quizdetails.html.twig', [
            'quiz' => $quiz

        ]);
    }

    #[Route('/login', name: 'app_login')]
    public function login()
    {
        return $this->render('security/login.html.twig');
    }
}
