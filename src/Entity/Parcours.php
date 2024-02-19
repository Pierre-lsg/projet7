<?php

namespace App\Entity;

use App\Repository\ParcoursRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ParcoursRepository::class)]
class Parcours
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\ManyToMany(targetEntity: CibleDeParcours::class, inversedBy: 'parcours')]
    private Collection $cibles;

    #[ORM\OneToMany(mappedBy: 'parcours', targetEntity: Competition::class)]
    private Collection $competitions;

    public function __construct()
    {
        $this->cibles = new ArrayCollection();
        $this->competitions = new ArrayCollection();
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

    /**
     * @return Collection<int, CibleDeParcours>
     */
    public function getCibles(): Collection
    {
        return $this->cibles;
    }

    public function addCible(CibleDeParcours $cible): static
    {
        if (!$this->cibles->contains($cible)) {
            $this->cibles->add($cible);
        }

        return $this;
    }

    public function removeCible(CibleDeParcours $cible): static
    {
        $this->cibles->removeElement($cible);

        return $this;
    }

    /**
     * @return Collection<int, Competition>
     */
    public function getCompetitions(): Collection
    {
        return $this->competitions;
    }

    public function addCompetition(Competition $competition): static
    {
        if (!$this->competitions->contains($competition)) {
            $this->competitions->add($competition);
            $competition->setParcours($this);
        }

        return $this;
    }

    public function removeCompetition(Competition $competition): static
    {
        if ($this->competitions->removeElement($competition)) {
            // set the owning side to null (unless already changed)
            if ($competition->getParcours() === $this) {
                $competition->setParcours(null);
            }
        }

        return $this;
    }
}
