<?php

namespace App\Entity;

use App\Repository\PointsClassementEquipeRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


#[ORM\Entity(repositoryClass: PointsClassementEquipeRepository::class)]
class PointsClassementEquipe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    #[Assert\NotBlank]
    #[Assert\Positive]
    private ?int $classement = null;

    #[ORM\Column]
    #[Assert\NotBlank]
    #[Assert\Positive]
    private ?int $points = null;

    #[ORM\ManyToOne(inversedBy: 'listePointsClassementEquipe')]
    #[ORM\JoinColumn(nullable: false)]
    private ?ReglementChampionnat $reglementChampionnat = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getClassement(): ?int
    {
        return $this->classement;
    }

    public function setClassement(int $classement): static
    {
        $this->classement = $classement;

        return $this;
    }

    public function getPoints(): ?int
    {
        return $this->points;
    }

    public function setPoints(int $points): static
    {
        $this->points = $points;

        return $this;
    }

    public function getReglementChampionnat(): ?ReglementChampionnat
    {
        return $this->reglementChampionnat;
    }

    public function setReglementChampionnat(?ReglementChampionnat $reglementChampionnat): static
    {
        $this->reglementChampionnat = $reglementChampionnat;

        return $this;
    }
}
