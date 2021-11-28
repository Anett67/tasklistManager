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
     * @param SerializerInterface $serializer
     * @return Response
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
    public function login(): Response
    {

        if($this->isGranted('ROLE_USER')){
            return $this->redirectToRoute('home');
        }

        return $this->render('home/index.html.twig', [
            'page_title' => 'Connexion/Inscription',
            'user' => null
        ]);
    }

    /**
     * @Route("/inscription", name="inscription")
     */
    public function signin(): Response
    {
        if($this->getUser()){
            return $this->redirectToRoute('home');
        }

        return $this->render('home/index.html.twig', [
            'page_title' => 'Connexion/Inscription',
            'user' => null
        ]);
    }
}
