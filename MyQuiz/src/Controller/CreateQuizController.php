<?php

namespace App\Controller;

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

class CreateQuizController extends AbstractController
{
    #[Route('/create/quiz', name: 'create_quiz')]
    public function index(): Response
    {
        return $this->render('create_quiz/index.html.twig', [
            'controller_name' => 'CreateQuizController',
        ]);
    }


    /* Création d'un quiz -> Catégorie / Nom */
    #[Route('/add/categories', name: 'user_add_categories')]
    public function addQuizCategorie(Request $request)
    {
        $categorie = new QuizCategorie;
        $categorieForm = $this->createForm(CategoriesType::class, $categorie);
        $categorieForm->handleRequest($request);

        if ($categorieForm->isSubmitted() && $categorieForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($categorie);
            $em->flush();

            return $this->redirectToRoute('user_add_categories');
        }

        return $this->render('create_quiz/categories/index.html.twig', [
            'categorieForm' => $categorieForm->createView()
        ]);
    }

    #[Route('/add/quiz', name: 'user_add_quiz')]
    public function addQuizName(Request $request)
    {
        $name = new QuizName;
        $question = new QuizQuestions;


        $form = $this->createForm(NameType::class, $name);
        $questionForm = $this->createForm(QuestionsType::class, $question);


        $form->handleRequest($request);
        $questionForm->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($name);
            $em->flush();

            return $this->redirectToRoute('user_add_quiz');
        }

        if ($questionForm->isSubmitted() && $questionForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($question);
            $em->flush();

            return $this->redirectToRoute('user_add_quiz');
        }

        return $this->render('/create_quiz/create/create.html.twig', [
            'form' => $form->createView(),
            'questionForm' => $questionForm->createView(),
        ]);
    }

    #[Route('/add/questions', name: 'user_add_questions')]
    public function addQuizQuestions(Request $request)
    {
        $name = new QuizName;
        $question = new QuizQuestions;


        $form = $this->createForm(NameType::class, $name);
        $questionForm = $this->createForm(QuestionsType::class, $question);


        $form->handleRequest($request);
        $questionForm->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($name);
            $em->flush();

            return $this->redirectToRoute('user_add_questions');
        }

        if ($questionForm->isSubmitted() && $questionForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($question);
            $em->flush();

            return $this->redirectToRoute('user_add_questions');
        }

        return $this->render('create_quiz/questions/index.html.twig', [
            'form' => $form->createView(),
            'questionForm' => $questionForm->createView(),
        ]);
    }

    #[Route('/add/answers', name: 'user_add_answers')]
    public function addQuizAnswers(Request $request)
    {
        $name = new QuizName;
        $question = new QuizQuestions;
        $answers = new QuizAnswers;

        $nameForm = $this->createForm(NameType::class, $name);
        $answersForm = $this->createForm(AnswersType::class, $answers);
        $questionForm = $this->createForm(QuestionsType::class, $question);

        $nameForm->handleRequest($request);
        $answersForm->handleRequest($request);
        $questionForm->handleRequest($request);

        if ($nameForm->isSubmitted() && $nameForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($name);
            $em->flush();

            return $this->redirectToRoute('user_add_answers');
        }

        if ($answersForm->isSubmitted() && $answersForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($answers);
            $em->flush();

            return $this->redirectToRoute('user_add_answers');
        }

        if ($questionForm->isSubmitted() && $questionForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($question);
            $em->flush();

            return $this->redirectToRoute('user_add_answers');
        }

        return $this->render('create_quiz/answers/index.html.twig', [
            'answersForm' => $answersForm->createView(),
            'questionForm' => $questionForm->createView(),
            'nameForm' => $nameForm->createView(),
        ]);
    }
}
