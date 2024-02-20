<?php

namespace App\Entity;

use App\Repository\JoueurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: JoueurRepository::class)]
class Joueur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nom = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $pseudo = null;

    #[ORM\ManyToOne(inversedBy: 'joueurs')]
    private ?Club $club = null;

    #[ORM\ManyToOne(inversedBy: 'joueurs')]
    private ?Equipe $equipe = null;

    #[ORM\ManyToMany(targetEntity: Championnat::class, mappedBy: 'joueursChampionnat')]
    private Collection $championnats;

    #[ORM\OneToMany(mappedBy: 'joueur', targetEntity: ClassementJoueur::class)]
    private Collection $classementJoueurs;

    public function __construct()
    {
        $this->championnats = new ArrayCollection();
        $this->classementJoueurs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPseudo(): ?string
    {
        return $this->pseudo;
    }

    public function setPseudo(?string $pseudo): static
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    public function getClub(): ?Club
    {
        return $this->club;
    }

    public function setClub(?Club $club): static
    {
        $this->club = $club;

        return $this;
    }

    public function getEquipe(): ?Equipe
    {
        return $this->equipe;
    }

    public function setEquipe(?Equipe $equipe): static
    {
        $this->equipe = $equipe;

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
            $championnat->addJoueursChampionnat($this);
        }

        return $this;
    }

    public function removeChampionnat(Championnat $championnat): static
    {
        if ($this->championnats->removeElement($championnat)) {
            $championnat->removeJoueursChampionnat($this);
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
            $classementJoueur->setJoueur($this);
        }

        return $this;
    }

    public function removeClassementJoueur(ClassementJoueur $classementJoueur): static
    {
        if ($this->classementJoueurs->removeElement($classementJoueur)) {
            // set the owning side to null (unless already changed)
            if ($classementJoueur->getJoueur() === $this) {
                $classementJoueur->setJoueur(null);
            }
        }

        return $this;
    }
}
