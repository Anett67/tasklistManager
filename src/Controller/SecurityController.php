<?php

namespace App\Controller;

use phpDocumentor\Reflection\Types\This;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SecurityController extends AbstractController
{
    /**
     * @Route("/connexion", name="app_login", methods={"POST"})
     */
    public function login(): Response
    {
        return $this->json([
           'user' => $this->getUser() ? $this->getUser()->getUserIdentifier() : null
        ]);
    }
}
