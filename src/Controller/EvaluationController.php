<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\EvaluationType;
use App\Entity\Evaluation;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\MatiereRepository;
use App\Repository\EtudiantRepository;
use App\Entity\Etudiant;
use App\Repository\EvaluationRepository;




class EvaluationController extends AbstractController
{
    #[Route('/evaluation', name: 'app_evaluation')]
    public function index(Request $request, MatiereRepository $matiereRepository,EtudiantRepository $etudiantRepository ,EntityManagerInterface $manager): Response
    {
        $form = $this->createForm(EvaluationType::class);
        $form ->handleRequest($request);

        if($form->isSubmitted()){
            $evaluation=new Evaluation();
            $evaluation->setnote($request->get('evaluation')['note']);
            //dd($request);
           $matiere=$matiereRepository->findOneBy(['id'=>$request->get('evaluation')['matiere']]);
           $evaluation->setMatiere($matiere);
           $etudiant=$etudiantRepository->findOneBy(['id'=>$request->get('evaluation')['Etudiant']]);
           $evaluation->setEtudiant($etudiant);
           $manager->persist($evaluation);
           $manager->flush();
                
        }
        return $this->render('evaluation/index.html.twig', [
            'evaluation' => $form->createView(),
        ]);
    }

    #[Route('/evaluation/note/{id}', name: 'app_evaluation_note')]
    public function listeEvaluation(EtudiantRepository $etudiantRepository, Etudiant $etudiant, EvaluationRepository $evaluationRepository): Response
    {
        //Récuperer les lignes dans évaluations en fonction de l'étudiant récupéré
        $evaluations= $evaluationRepository->findBy(['Etudiant'=> $etudiant]);
        return $this->render('evaluation/list_evaluation.html.twig', [
            'etu' =>$etudiant,
            'evas' => $evaluations
        ]);
    }
}
