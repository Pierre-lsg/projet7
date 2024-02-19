<?php

namespace App\Entity;

use App\Repository\FlightRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FlightRepository::class)]
class Flight
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column]
    private ?int $ordre = null;

    #[ORM\OneToMany(mappedBy: 'flight', targetEntity: Equipe::class)]
    private Collection $equipes;

    #[ORM\OneToOne(mappedBy: 'flight', cascade: ['persist', 'remove'])]
    private ?CarteDeScores $carteDeScores = null;

    public function __construct()
    {
        $this->equipes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

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

    /**
     * @return Collection<int, Equipe>
     */
    public function getEquipes(): Collection
    {
        return $this->equipes;
    }

    public function addEquipe(Equipe $equipe): static
    {
        if (!$this->equipes->contains($equipe)) {
            $this->equipes->add($equipe);
            $equipe->setFlight($this);
        }

        return $this;
    }

    public function removeEquipe(Equipe $equipe): static
    {
        if ($this->equipes->removeElement($equipe)) {
            // set the owning side to null (unless already changed)
            if ($equipe->getFlight() === $this) {
                $equipe->setFlight(null);
            }
        }

        return $this;
    }

    public function getCarteDeScores(): ?CarteDeScores
    {
        return $this->carteDeScores;
    }

    public function setCarteDeScores(CarteDeScores $carteDeScores): static
    {
        // set the owning side of the relation if necessary
        if ($carteDeScores->getFlight() !== $this) {
            $carteDeScores->setFlight($this);
        }

        $this->carteDeScores = $carteDeScores;

        return $this;
    }
}
