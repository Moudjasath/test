<?php

namespace App\Entity;

use App\Repository\EtudiantRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EtudiantRepository::class)]
class Etudiant
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $NomEtudiant = null;

    #[ORM\Column(length: 100)]
    private ?string $PrenomEtudiant = null;

    #[ORM\Column]
    private ?int $Matricule = null;

    #[ORM\Column]
    private ?int $Age = null;

    #[ORM\Column(length: 100)]
    private ?string $Sexe = null;


    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Filiere $filiere = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?SalleCours $sallecours = null;

    #[ORM\Column(nullable: true)]
    private ?int $moyenne = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomEtudiant(): ?string
    {
        return $this->NomEtudiant;
    }

    public function setNomEtudiant(string $NomEtudiant): static
    {
        $this->NomEtudiant = $NomEtudiant;

        return $this;
    }

    public function getPrenomEtudiant(): ?string
    {
        return $this->PrenomEtudiant;
    }

    public function setPrenomEtudiant(string $PrenomEtudiant): static
    {
        $this->PrenomEtudiant = $PrenomEtudiant;

        return $this;
    }

    public function getMatricule(): ?int
    {
        return $this->Matricule;
    }

    public function setMatricule(int $Matricule): static
    {
        $this->Matricule = $Matricule;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->Age;
    }

    public function setAge(int $Age): static
    {
        $this->Age = $Age;

        return $this;
    }

    public function getSexe(): ?string
    {
        return $this->Sexe;
    }

    public function setSexe(string $Sexe): static
    {
        $this->Sexe = $Sexe;

        return $this;
    }

    
    public function getFiliere(): ?Filiere
    {
        return $this->filiere;
    }

    public function setFiliere(?Filiere $filiere): static
    {
        $this->filiere = $filiere;

        return $this;
    }

    public function getSallecours(): ?SalleCours
    {
        return $this->sallecours;
    }

    public function setSallecours(?SalleCours $sallecours): static
    {
        $this->sallecours = $sallecours;

        return $this;
    }

    public function getMoyenne(): ?int
    {
        return $this->moyenne;
    }

    public function setMoyenne(?int $moyenne): static
    {
        $this->moyenne = $moyenne;

        return $this;
    }
    public function __toString(){
        return $this->getNomEtudiant();
    }
}
