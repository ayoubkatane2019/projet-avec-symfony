<?php

namespace App\Controller;

use App\Entity\Name;
use App\Repository\NameRepository;
use App\Repository\ReservationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ResController extends AbstractController
{
    public function __construct(EntityManagerInterface $em)
    {
        $this->em=$em;
    }
    #[Route('/res', name: 'app_res', methods: "POST")]
    public function index(Request $request): Response
    {
        

        if ($request->request->get("submit")>0){
            dd($request);
            $reservation = new Name();
            $reservation->setName($request->request->get('name'));
            $reservation->setNumero($request->request->get('numero'));
            $reservation->setEmail($request->request->get('email'));

            
            
            $this->em->persist($reservation);
            $this->em->flush();
            
            return $this->redirectToRoute('app_homme-s');
   
        }   
 
        return $this->render('res/index.html.twig', [
            'controller_name' => 'ResController',
        ]);
    }
    
}