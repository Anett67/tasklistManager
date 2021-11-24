<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'page_title' => 'Mes listes de tâches',
        ]);
    }

    /**
     * @Route("/login", name="login")
     */
    public function login(): Response
    {
        return $this->render('home/index.html.twig', [
            'page_title' => 'Se connecter',
        ]);
    }

    /**
     * @Route("/signin", name="signin")
     */
    public function signin(): Response
    {
        return $this->render('home/index.html.twig', [
            'page_title' => 'S\'inscrire',
        ]);
    }
}
