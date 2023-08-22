<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ProfesseurRepository;


class ProfesseurController extends AbstractController
{
    #[Route('/professeur', name: 'app_professeur')]
    public function index(ProfesseurRepository $professeurRepository)
    {
        $professeur=$professeurRepository->findAll();
        return $this->render('professeur/index.html.twig',
        [
            'professeurs'=> $professeur,
        ]);
    }
}
