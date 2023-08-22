<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\EtudiantType;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Etudiant;
use App\Repository\FiliereRepository;
use App\Repository\SalleCoursRepository;
use Doctrine\ORM\EntityManagerInterface;


class EtudformController extends AbstractController
{
    #[Route('/etudform', name: 'app_etudform')]
    public function index(Request $request,FiliereRepository $filiereRepository,SalleCoursRepository $sallecoursRepository, EntityManagerInterface $manager): Response
    {
        $form = $this->createForm(EtudiantType::class);
        //Le handleRequest nécessaire pour récuperer les informations saisies au niveau du formulaire dans le $request
        $form->handleRequest($request);

        // Pour savoir si le formulaire a été souimis
        if($form->isSubmitted()){
            //Création de l'objet qu'on veut enregistrer
            $etudiant = new Etudiant();
            //Définition des informations dans l'objet crée
            $etudiant->setNomEtudiant($request->get('etudiant')['NomEtudiant']);
            $etudiant->setPrenomEtudiant($request->get('etudiant')['PrenomEtudiant']);
            $etudiant->setMatricule($request->get('etudiant')['Matricule']);
            $etudiant->setAge($request->get('etudiant')['Age']);
            $etudiant->setSexe($request->get('etudiant')['Sexe']);
            $filiere = $filiereRepository->findOneBy(['id' => $request->get('etudiant')['filiere']]);
            $etudiant->setfiliere($filiere);
            $sallecours=$sallecoursRepository->findOneBy(['id'=>$request->get('etudiant')['sallecours']]);
            $etudiant->setsallecours($sallecours);
            //Pour enregegistrement dans la base de donnée
            $manager->persist($etudiant);
            $manager->flush();

        }

        return $this->render('etudform/etudform.html.twig', [
            'etudiant' => $form->createView(),

        ]);
    }
}
