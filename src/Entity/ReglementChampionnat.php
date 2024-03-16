<?php

namespace App\Entity;

use App\Repository\ReglementChampionnatRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ReglementChampionnatRepository::class)]
class ReglementChampionnat
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $nombreCompetitionRequis = null;

    #[ORM\OneToMany(mappedBy: 'reglementChampionnat', targetEntity: PointsClassementEquipe::class, orphanRemoval: true, cascade: ['persist'])]
    #[Assert\Valid]
    private Collection $listePointsClassementEquipe;

    #[ORM\ManyToOne(inversedBy: 'reglementChampionnat')]
    #[ORM\JoinColumn(nullable: false)]
    private ?RepartitionPoints $repartitionPoints = null;

    #[ORM\ManyToOne(inversedBy: 'reglementChampionnat')]
    #[ORM\JoinColumn(nullable: false)]
    private ?ModeCalculChampionnat $modeCalculChampionnat = null;

    public function __construct()
    {
        $this->listePointsClassementEquipe = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombreCompetitionRequis(): ?int
    {
        return $this->nombreCompetitionRequis;
    }

    public function setNombreCompetitionRequis(int $nombreCompetitionRequis): static
    {
        $this->nombreCompetitionRequis = $nombreCompetitionRequis;

        return $this;
    }

    /**
     * @return Collection<int, PointsClassementEquipe>
     */
    public function getListePointsClassementEquipe(): Collection
    {
        return $this->listePointsClassementEquipe;
    }

    public function addListePointsClassementEquipe(PointsClassementEquipe $listePointsClassementEquipe): static
    {
        if (!$this->listePointsClassementEquipe->contains($listePointsClassementEquipe)) {
            $this->listePointsClassementEquipe->add($listePointsClassementEquipe);
            $listePointsClassementEquipe->setReglementChampionnat($this);
        }

        return $this;
    }

    public function removeListePointsClassementEquipe(PointsClassementEquipe $listePointsClassementEquipe): static
    {
        if ($this->listePointsClassementEquipe->removeElement($listePointsClassementEquipe)) {
            // set the owning side to null (unless already changed)
            if ($listePointsClassementEquipe->getReglementChampionnat() === $this) {
                $listePointsClassementEquipe->setReglementChampionnat(null);
            }
        }

        return $this;
    }

    public function getRepartitionPoints(): ?RepartitionPoints
    {
        return $this->repartitionPoints;
    }

    public function setRepartitionPoints(?RepartitionPoints $repartitionPoints): static
    {
        $this->repartitionPoints = $repartitionPoints;

        return $this;
    }

    public function getModeCalculChampionnat(): ?ModeCalculChampionnat
    {
        return $this->modeCalculChampionnat;
    }

    public function setModeCalculChampionnat(?ModeCalculChampionnat $modeCalculChampionnat): static
    {
        $this->modeCalculChampionnat = $modeCalculChampionnat;

        return $this;
    }
}
