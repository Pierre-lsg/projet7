<?php

namespace App\Entity;

use App\Repository\CibleRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CibleRepository::class)]
class Cible
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Repere $depart = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Repere $arrivee = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDepart(): ?Repere
    {
        return $this->depart;
    }

    public function setDepart(?Repere $depart): static
    {
        $this->depart = $depart;

        return $this;
    }

    public function getArrivee(): ?Repere
    {
        return $this->arrivee;
    }

    public function setArrivee(?Repere $arrivee): static
    {
        $this->arrivee = $arrivee;

        return $this;
    }
}
