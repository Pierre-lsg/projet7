<?php

namespace App\Entity;

use App\Repository\CarteDeScoresRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CarteDeScoresRepository::class)]
class CarteDeScores
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToMany(mappedBy: 'carteDeScores', targetEntity: Score::class, orphanRemoval: true)]
    private Collection $scores;

    #[ORM\OneToOne(inversedBy: 'carteDeScores', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Flight $flight = null;

    #[ORM\Column]
    private ?bool $estSignee = null;

    public function __construct()
    {
        $this->scores = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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
            $score->setCarteDeScores($this);
        }

        return $this;
    }

    public function removeScore(Score $score): static
    {
        if ($this->scores->removeElement($score)) {
            // set the owning side to null (unless already changed)
            if ($score->getCarteDeScores() === $this) {
                $score->setCarteDeScores(null);
            }
        }

        return $this;
    }

    public function getFlight(): ?Flight
    {
        return $this->flight;
    }

    public function setFlight(Flight $flight): static
    {
        $this->flight = $flight;

        return $this;
    }

    public function isEstSignee(): ?bool
    {
        return $this->estSignee;
    }

    public function setEstSignee(bool $estSignee): static
    {
        $this->estSignee = $estSignee;

        return $this;
    }
}
