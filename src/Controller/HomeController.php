<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(SerializerInterface $serializer): Response
    {
        return $this->render('home/index.html.twig', [
            'page_title' => 'Mes listes de tâches',
            'user' => $serializer->serialize($this->getUser(), 'jsonld')
        ]);
    }

    /**
     * @Route("/connexion", name="login")
     */
    public function login(SerializerInterface $serializer): Response
    {
        return $this->render('home/index.html.twig', [
            'page_title' => 'Se connecter',
            'user' => $serializer->serialize($this->getUser(), 'jsonld')
        ]);
    }

    /**
     * @Route("/inscription", name="inscription")
     */
    public function signin(SerializerInterface $serializer): Response
    {
        return $this->render('home/index.html.twig', [
            'page_title' => 'S\'inscrire',
            'user' => $serializer->serialize($this->getUser(), 'jsonld')
        ]);
    }
}
