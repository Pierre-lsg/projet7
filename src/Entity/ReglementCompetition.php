<?php

namespace App\Entity;

use App\Repository\ReglementCompetitionRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReglementCompetitionRepository::class)]
class ReglementCompetition
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateCompetition = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $datePublicationResultat = null;

    #[ORM\ManyToOne]
    private ?Repere $accueil = null;

    #[ORM\Column]
    private ?int $nombreJoueurParEquipe = null;

    #[ORM\Column]
    private ?int $nombreEquipeParFlight = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?ModeCompetition $modeCompetition = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?RegleCroix $regleCroix = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateCompetition(): ?\DateTimeInterface
    {
        return $this->dateCompetition;
    }

    public function setDateCompetition(\DateTimeInterface $dateCompetition): static
    {
        $this->dateCompetition = $dateCompetition;

        return $this;
    }

    public function getDatePublicationResultat(): ?\DateTimeInterface
    {
        return $this->datePublicationResultat;
    }

    public function setDatePublicationResultat(\DateTimeInterface $datePublicationResultat): static
    {
        $this->datePublicationResultat = $datePublicationResultat;

        return $this;
    }

    public function getAccueil(): ?Repere
    {
        return $this->accueil;
    }

    public function setAccueil(?Repere $accueil): static
    {
        $this->accueil = $accueil;

        return $this;
    }

    public function getNombreJoueurParEquipe(): ?int
    {
        return $this->nombreJoueurParEquipe;
    }

    public function setNombreJoueurParEquipe(int $nombreJoueurParEquipe): static
    {
        $this->nombreJoueurParEquipe = $nombreJoueurParEquipe;

        return $this;
    }

    public function getNombreEquipeParFlight(): ?int
    {
        return $this->nombreEquipeParFlight;
    }

    public function setNombreEquipeParFlight(int $nombreEquipeParFlight): static
    {
        $this->nombreEquipeParFlight = $nombreEquipeParFlight;

        return $this;
    }

    public function getModeCompetition(): ?ModeCompetition
    {
        return $this->modeCompetition;
    }

    public function setModeCompetition(?ModeCompetition $modeCompetition): static
    {
        $this->modeCompetition = $modeCompetition;

        return $this;
    }

    public function getRegleCroix(): ?RegleCroix
    {
        return $this->regleCroix;
    }

    public function setRegleCroix(?RegleCroix $regleCroix): static
    {
        $this->regleCroix = $regleCroix;

        return $this;
    }
}
