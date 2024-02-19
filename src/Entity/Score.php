<?php

namespace App\Entity;

use App\Repository\ScoreRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ScoreRepository::class)]
class Score
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'scores')]
    #[ORM\JoinColumn(nullable: false)]
    private ?CibleDeParcours $cibleDeParcours = null;

    #[ORM\Column]
    private ?int $score = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Joueur $joueur = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Equipe $equipe = null;

    #[ORM\ManyToOne(inversedBy: 'scores')]
    #[ORM\JoinColumn(nullable: false)]
    private ?CarteDeScores $carteDeScores = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCibleDeParcours(): ?CibleDeParcours
    {
        return $this->cibleDeParcours;
    }

    public function setCibleDeParcours(?CibleDeParcours $cibleDeParcours): static
    {
        $this->cibleDeParcours = $cibleDeParcours;

        return $this;
    }

    public function getScore(): ?int
    {
        return $this->score;
    }

    public function setScore(int $score): static
    {
        $this->score = $score;

        return $this;
    }

    public function getJoueur(): ?Joueur
    {
        return $this->joueur;
    }

    public function setJoueur(?Joueur $joueur): static
    {
        $this->joueur = $joueur;

        return $this;
    }

    public function getEquipe(): ?Equipe
    {
        return $this->equipe;
    }

    public function setEquipe(?Equipe $equipe): static
    {
        $this->equipe = $equipe;

        return $this;
    }

    public function getCarteDeScores(): ?CarteDeScores
    {
        return $this->carteDeScores;
    }

    public function setCarteDeScores(?CarteDeScores $carteDeScores): static
    {
        $this->carteDeScores = $carteDeScores;

        return $this;
    }

}
