<?php

namespace App\Controller\Admin;

use App\Entity\Task;
use App\Entity\Tasklist;
use App\Entity\TaskStatus;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Tasklist Manager');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Liste de tâches', 'fa fa-list', Tasklist::class);
        yield MenuItem::linkToCrud('Tâches', 'fa fa-list', Task::class);
        yield MenuItem::linkToCrud('Status', 'fa fa-list', TaskStatus::class);
        yield MenuItem::linkToCrud('User', 'fa fa-list', User::class);
    }
}
