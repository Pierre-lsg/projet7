<?php

namespace App\Entity;

use App\Repository\CibleDeParcoursRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CibleDeParcoursRepository::class)]
class CibleDeParcours
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Cible $cible = null;

    #[ORM\Column]
    private ?int $ordre = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?FormuleDeJeu $formuleDeJeu = null;

    #[ORM\ManyToMany(targetEntity: Parcours::class, mappedBy: 'cibles')]
    private Collection $parcours;

    #[ORM\OneToMany(mappedBy: 'cibleDeParcours', targetEntity: Score::class)]
    private Collection $scores;

    public function __construct()
    {
        $this->parcours = new ArrayCollection();
        $this->scores = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCible(): ?Cible
    {
        return $this->cible;
    }

    public function setCible(?Cible $cible): static
    {
        $this->cible = $cible;

        return $this;
    }

    public function getOrdre(): ?int
    {
        return $this->ordre;
    }

    public function setOrdre(int $ordre): static
    {
        $this->ordre = $ordre;

        return $this;
    }

    public function getFormuleDeJeu(): ?FormuleDeJeu
    {
        return $this->formuleDeJeu;
    }

    public function setFormuleDeJeu(?FormuleDeJeu $formuleDeJeu): static
    {
        $this->formuleDeJeu = $formuleDeJeu;

        return $this;
    }

    /**
     * @return Collection<int, Parcours>
     */
    public function getParcours(): Collection
    {
        return $this->parcours;
    }

    public function addParcours(Parcours $parcour): static
    {
        if (!$this->parcours->contains($parcour)) {
            $this->parcours->add($parcour);
            $parcour->addCible($this);
        }

        return $this;
    }

    public function removeParcours(Parcours $parcour): static
    {
        if ($this->parcours->removeElement($parcour)) {
            $parcour->removeCible($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Score>
     */
    public function getScores(): Collection
    {
        return $this->scores;
    }

    public function addScore(Score $score): static
    {
        if (!$this->scores->contains($score)) {
            $this->scores->add($score);
            $score->setCibleDeParcours($this);
        }

        return $this;
    }

    public function removeScore(Score $score): static
    {
        if ($this->scores->removeElement($score)) {
            // set the owning side to null (unless already changed)
            if ($score->getCibleDeParcours() === $this) {
                $score->setCibleDeParcours(null);
            }
        }

        return $this;
    }
}
