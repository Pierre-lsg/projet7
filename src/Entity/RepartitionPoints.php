<?php

namespace App\Entity;

use App\Repository\RepartitionPointsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RepartitionPointsRepository::class)]
class RepartitionPoints
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\OneToMany(mappedBy: 'repartitionPoints', targetEntity: ReglementChampionnat::class)]
    private Collection $reglementChampionnat;

    public function __construct()
    {
        $this->reglementChampionnat = new ArrayCollection();
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
     * @return Collection<int, ReglementChampionnat>
     */
    public function getReglementChampionnat(): Collection
    {
        return $this->reglementChampionnat;
    }

    public function addReglementChampionnat(ReglementChampionnat $reglementChampionnat): static
    {
        if (!$this->reglementChampionnat->contains($reglementChampionnat)) {
            $this->reglementChampionnat->add($reglementChampionnat);
            $reglementChampionnat->setRepartitionPoints($this);
        }

        return $this;
    }

    public function removeReglementChampionnat(ReglementChampionnat $reglementChampionnat): static
    {
        if ($this->reglementChampionnat->removeElement($reglementChampionnat)) {
            // set the owning side to null (unless already changed)
            if ($reglementChampionnat->getRepartitionPoints() === $this) {
                $reglementChampionnat->setRepartitionPoints(null);
            }
        }

        return $this;
    }
}
