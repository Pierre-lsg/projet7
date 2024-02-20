<?php

namespace App\Entity;

use App\Repository\ChampionnatRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ChampionnatRepository::class)]
class Championnat
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    private ?string $saison = null;

    #[ORM\OneToMany(mappedBy: 'championnat', targetEntity: Competition::class)]
    private Collection $competitions;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?ReglementChampionnat $reglementChampionnat = null;

    #[ORM\ManyToMany(targetEntity: Club::class, inversedBy: 'championnats')]
    private Collection $clubsChampionnat;

    #[ORM\ManyToMany(targetEntity: Joueur::class, inversedBy: 'championnats')]
    private Collection $joueursChampionnat;

    #[ORM\OneToMany(mappedBy: 'championnat', targetEntity: ClassementJoueur::class, orphanRemoval: true)]
    private Collection $classementClubs;

    #[ORM\OneToMany(mappedBy: 'championnat', targetEntity: ClassementJoueur::class, orphanRemoval: true)]
    private Collection $classementJoueurs;

    public function __construct()
    {
        $this->competitions = new ArrayCollection();
        $this->clubsChampionnat = new ArrayCollection();
        $this->joueursChampionnat = new ArrayCollection();
        $this->classementClubs = new ArrayCollection();
        $this->classementJoueurs = new ArrayCollection();
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

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getSaison(): ?string
    {
        return $this->saison;
    }

    public function setSaison(string $saison): static
    {
        $this->saison = $saison;

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
            $competition->setChampionnat($this);
        }

        return $this;
    }

    public function removeCompetition(Competition $competition): static
    {
        if ($this->competitions->removeElement($competition)) {
            // set the owning side to null (unless already changed)
            if ($competition->getChampionnat() === $this) {
                $competition->setChampionnat(null);
            }
        }

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

    /**
     * @return Collection<int, Club>
     */
    public function getClubsChampionnat(): Collection
    {
        return $this->clubsChampionnat;
    }

    public function addClubsChampionnat(Club $clubsChampionnat): static
    {
        if (!$this->clubsChampionnat->contains($clubsChampionnat)) {
            $this->clubsChampionnat->add($clubsChampionnat);
        }

        return $this;
    }

    public function removeClubsChampionnat(Club $clubsChampionnat): static
    {
        $this->clubsChampionnat->removeElement($clubsChampionnat);

        return $this;
    }

    /**
     * @return Collection<int, Joueur>
     */
    public function getJoueursChampionnat(): Collection
    {
        return $this->joueursChampionnat;
    }

    public function addJoueursChampionnat(Joueur $joueursChampionnat): static
    {
        if (!$this->joueursChampionnat->contains($joueursChampionnat)) {
            $this->joueursChampionnat->add($joueursChampionnat);
        }

        return $this;
    }

    public function removeJoueursChampionnat(Joueur $joueursChampionnat): static
    {
        $this->joueursChampionnat->removeElement($joueursChampionnat);

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
            $classementClub->setChampionnat($this);
        }

        return $this;
    }

    public function removeClassementClub(ClassementClub $classementClub): static
    {
        if ($this->classementClubs->removeElement($classementClub)) {
            // set the owning side to null (unless already changed)
            if ($classementClub->getChampionnat() === $this) {
                $classementClub->setChampionnat(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ClassementJoueur>
     */
    public function getClassementJoueurs(): Collection
    {
        return $this->classementJoueurs;
    }

    public function addClassementJoueur(ClassementJoueur $classementJoueur): static
    {
        if (!$this->classementJoueurs->contains($classementJoueur)) {
            $this->classementJoueurs->add($classementJoueur);
            $classementJoueur->setChampionnat($this);
        }

        return $this;
    }

    public function removeClassementJoueur(ClassementJoueur $classementJoueur): static
    {
        if ($this->classementJoueurs->removeElement($classementJoueur)) {
            // set the owning side to null (unless already changed)
            if ($classementJoueur->getChampionnat() === $this) {
                $classementJoueur->setChampionnat(null);
            }
        }

        return $this;
    }
}
