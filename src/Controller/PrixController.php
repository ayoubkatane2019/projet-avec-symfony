<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PrixController extends AbstractController
{
    #[Route('/prix', name: 'app_prix')]
    public function index(): Response
    {
        return $this->render('prix/index.html.twig', [
            'controller_name' => 'PrixController',
        ]);
    }
}
