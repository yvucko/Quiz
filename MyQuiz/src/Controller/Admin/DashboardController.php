<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use App\Entity\QuizCategorie;
use App\Entity\QuizName;
use App\Entity\QuizQuestions;
use App\Entity\QuizAnswers;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        $routeBuilder = $this->get(AdminUrlGenerator::class);

        return $this->redirect($routeBuilder->setController(UsersCrudController::class)->generateUrl());
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('MyQuiz');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Utilisateurs', 'fa fa-home');
        yield MenuItem::linkToCrud('Catégories', 'fas fa-list', QuizCategorie::class);
        yield MenuItem::linkToCrud('Quizs', 'fas fa-list', QuizName::class);
        yield MenuItem::linkToCrud('Questions', 'fas fa-list', QuizQuestions::class);
        yield MenuItem::linkToCrud('Réponses', 'fas fa-list', QuizAnswers::class);
    }
}
