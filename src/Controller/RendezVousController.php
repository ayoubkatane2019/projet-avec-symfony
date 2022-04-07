<?php

namespace App\Controller;

use App\Entity\RendezVous;
use App\Form\RendezVousType;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RendezVousController extends AbstractController
{
    #[Route('/rendez/vous', name: 'app_rendez_vous')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $rendez = new RendezVous();
        $form = $this->createForm(RendezVousType::class);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            // $rendez->setNom();
            // $rendez->setEmail();
            // $rendez->setNumero();
            $rendez = $form->getData();
            $entityManager->persist($rendez);
            $entityManager->flush();
        }

        return $this->render('rendez_vous/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
