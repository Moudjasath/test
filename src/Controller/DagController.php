<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\EtudiantRepository;


class DagController extends AbstractController
{
    #[Route('/Dag', name: 'app_Dag')]
    public function index(EtudiantRepository $etudiantRepository)
    {
        $etudiants = $etudiantRepository->findAll();
        // dd($etudiants);
        return $this->render(
            "dag/Dag.html.twig",
            [
                'etudiants'=> $etudiants,
            ]
        );
    }
}
