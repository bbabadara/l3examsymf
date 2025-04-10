<?php

namespace App\Controller;

use App\Entity\Patient;
use App\Repository\RendezVousRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use App\Entity\User;

final class RendezVousController extends AbstractController
{
    //route pour la liste des rendez-vous d''un patient apres connexion
    
    #[Route('/mes-rendez-vous', name: 'app_mes_rendez_vous')]
    #[IsGranted('ROLE_PATIENT')]
    public function mesRendezVous(RendezVousRepository $rendezVousRepository): Response
    {
        /** @var User $user */
        $user = $this->getUser();
        $patient = $user->getPatients()->first();
        
        $rendezVous = $rendezVousRepository->findBy(['patient' => $patient], ['date' => 'ASC']);

        return $this->render('rendez_vous/mes_rendez_vous.html.twig', [
            'rendezVous' => $rendezVous,
        ]);
    }

    #[Route('/rendezvous', name: 'app_rendez_vous')]
    public function index(): Response
    {
        return $this->render('rendez_vous/index.html.twig', [
            'controller_name' => 'RendezVousController',
        ]);
    }
}
