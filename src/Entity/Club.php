<?php

namespace App\Entity;

use App\Repository\ClubRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClubRepository::class)]
class Club
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\OneToMany(mappedBy: 'club', targetEntity: Joueur::class)]
    private Collection $joueurs;

    #[ORM\OneToMany(mappedBy: 'club', targetEntity: Equipe::class, orphanRemoval: true)]
    private Collection $equipes;

    #[ORM\ManyToMany(targetEntity: Championnat::class, mappedBy: 'clubsChampionnat')]
    private Collection $championnats;

    #[ORM\OneToMany(mappedBy: 'club', targetEntity: ClassementClub::class)]
    private Collection $classementClubs;

    public function __construct()
    {
        $this->joueurs = new ArrayCollection();
        $this->equipes = new ArrayCollection();
        $this->championnats = new ArrayCollection();
        $this->classementClubs = new ArrayCollection();
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
     * @return Collection<int, Joueur>
     */
    public function getJoueurs(): Collection
    {
        return $this->joueurs;
    }

    public function addJoueur(Joueur $joueur): static
    {
        if (!$this->joueurs->contains($joueur)) {
            $this->joueurs->add($joueur);
            $joueur->setClub($this);
        }

        return $this;
    }

    public function removeJoueur(Joueur $joueur): static
    {
        if ($this->joueurs->removeElement($joueur)) {
            // set the owning side to null (unless already changed)
            if ($joueur->getClub() === $this) {
                $joueur->setClub(null);
            }
        }

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
            $equipe->setClub($this);
        }

        return $this;
    }

    public function removeEquipe(Equipe $equipe): static
    {
        if ($this->equipes->removeElement($equipe)) {
            // set the owning side to null (unless already changed)
            if ($equipe->getClub() === $this) {
                $equipe->setClub(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Championnat>
     */
    public function getChampionnats(): Collection
    {
        return $this->championnats;
    }

    public function addChampionnat(Championnat $championnat): static
    {
        if (!$this->championnats->contains($championnat)) {
            $this->championnats->add($championnat);
            $championnat->addClubsChampionnat($this);
        }

        return $this;
    }

    public function removeChampionnat(Championnat $championnat): static
    {
        if ($this->championnats->removeElement($championnat)) {
            $championnat->removeClubsChampionnat($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, ClassementClub>
     */
    public function getClassementClubs(): Collection
    {
        return $this->classementClubs;
    }

    public function addClassementClub(ClassementClub $classementClub): static
    {
        if (!$this->classementClubs->contains($classementClub)) {
            $this->classementClubs->add($classementClub);
            $classementClub->setClub($this);
        }

        return $this;
    }

    public function removeClassementClub(ClassementClub $classementClub): static
    {
        if ($this->classementClubs->removeElement($classementClub)) {
            // set the owning side to null (unless already changed)
            if ($classementClub->getClub() === $this) {
                $classementClub->setClub(null);
            }
        }

        return $this;
    }
}
