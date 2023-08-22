<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\ProfesseurFormType;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Professeur;
use App\Repository\FiliereRepository;
use App\Repository\MatiereRepository;
use Doctrine\ORM\EntityManagerInterface;

class ProfesseurFormController extends AbstractController
{
    #[Route('/professeur/form', name: 'app_professeur_form')]
    public function index(Request $request,FiliereRepository $filiereRepository,MatiereRepository $MatiereRepository, EntityManagerInterface $manager): Response
    {
        $form = $this->createForm(ProfesseurFormType::class);
            $form->handleRequest($request);

                if($form->isSubmitted()){
                    $professeur = new Professeur();
                  //dd($request);
                  
                    $professeur->setNomProf($request->get('professeur_form')['nomProf']);
                    $professeur->setPrenomProf($request->get('professeur_form')['prenomProf']);
                    $professeur->setAge($request->get('professeur_form')['age']);
                    $professeur->setSexe($request->get('professeur_form')['sexe']);
                    $professeur->setTelephone($request->get('professeur_form')['telephone']);
                    $filiere = $filiereRepository->findOneBy(['id' => $request->get('professeur_form')['filiere']]);
                    $professeur->setFiliere($filiere);
                    $Matiere=$MatiereRepository->findOneBy(['id'=>$request->get('professeur_form')['matiere']]);
                    $professeur->setMatiere($Matiere);

                    $manager->persist($professeur);
                    $manager->flush();
                }
        return $this->render('professeur_form/index.html.twig', [
            'professeur' => $form->createView(),
        ]);
    }
}
