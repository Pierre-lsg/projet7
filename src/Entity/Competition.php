<?php

namespace App\Entity;

use App\Repository\CompetitionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CompetitionRepository::class)]
class Competition
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?ReglementCompetition $reglement = null;

    #[ORM\ManyToOne(inversedBy: 'competitions')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Parcours $parcours = null;

    #[ORM\OneToMany(mappedBy: 'competition', targetEntity: Flight::class, orphanRemoval: true)]
    private Collection $flights;

    #[ORM\OneToMany(mappedBy: 'competition', targetEntity: CarteDeScores::class, orphanRemoval: true)]
    private Collection $cartesDeScores;

    #[ORM\ManyToOne(inversedBy: 'competitions')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Championnat $championnat = null;

    #[ORM\OneToMany(mappedBy: 'competition', targetEntity: Equipe::class, orphanRemoval: true)]
    private Collection $equipes;

    public function __construct()
    {
        $this->flights = new ArrayCollection();
        $this->cartesDeScores = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getReglement(): ?ReglementCompetition
    {
        return $this->reglement;
    }

    public function setReglement(ReglementCompetition $reglement): static
    {
        $this->reglement = $reglement;

        return $this;
    }

    public function getParcours(): ?Parcours
    {
        return $this->parcours;
    }

    public function setParcours(?Parcours $parcours): static
    {
        $this->parcours = $parcours;

        return $this;
    }

    /**
     * @return Collection<int, Flight>
     */
    public function getFlights(): Collection
    {
        return $this->flights;
    }

    public function addFlight(Flight $flight): static
    {
        if (!$this->flights->contains($flight)) {
            $this->flights->add($flight);
            $flight->setCompetition($this);
        }

        return $this;
    }

    public function removeFlight(Flight $flight): static
    {
        if ($this->flights->removeElement($flight)) {
            // set the owning side to null (unless already changed)
            if ($flight->getCompetition() === $this) {
                $flight->setCompetition(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, CarteDeScores>
     */
    public function getCartesDeScores(): Collection
    {
        return $this->cartesDeScores;
    }

    public function addCartesDeScore(CarteDeScores $cartesDeScore): static
    {
        if (!$this->cartesDeScores->contains($cartesDeScore)) {
            $this->cartesDeScores->add($cartesDeScore);
            $cartesDeScore->setCompetition($this);
        }

        return $this;
    }

    public function removeCartesDeScore(CarteDeScores $cartesDeScore): static
    {
        if ($this->cartesDeScores->removeElement($cartesDeScore)) {
            // set the owning side to null (unless already changed)
            if ($cartesDeScore->getCompetition() === $this) {
                $cartesDeScore->setCompetition(null);
            }
        }

        return $this;
    }

    public function getChampionnat(): ?Championnat
    {
        return $this->championnat;
    }

    public function setChampionnat(?Championnat $championnat): static
    {
        $this->championnat = $championnat;

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
            $equipe->setCompetition($this);
        }

        return $this;
    }

    public function removeEquipe(Equipe $equipe): static
    {
        if ($this->equipes->removeElement($equipe)) {
            // set the owning side to null (unless already changed)
            if ($equipe->getCompetition() === $this) {
                $equipe->setCompetition(null);
            }
        }

        return $this;
    }
}
