<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AbonnementRepository")
 */
class Abonnement
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $LibelleAbonnement;

    /**
     * @ORM\Column(type="integer")
     */
    private $TicketsRestants;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Spectateur", inversedBy="Abonnements")
     */
    private $Spectateurs;

    public function __construct()
    {
        $this->Spectateurs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelleAbonnement(): ?string
    {
        return $this->LibelleAbonnement;
    }

    public function setLibelleAbonnement(string $LibelleAbonnement): self
    {
        $this->LibelleAbonnement = $LibelleAbonnement;

        return $this;
    }

    public function getTicketsRestants(): ?int
    {
        return $this->TicketsRestants;
    }

    public function setTicketsRestants(int $TicketsRestants): self
    {
        $this->TicketsRestants = $TicketsRestants;

        return $this;
    }

    /**
     * @return Collection|Spectateur[]
     */
    public function getSpectateurs(): Collection
    {
        return $this->Spectateurs;
    }

    public function addSpectateur(Spectateur $spectateur): self
    {
        if (!$this->Spectateurs->contains($spectateur)) {
            $this->Spectateurs[] = $spectateur;
        }

        return $this;
    }

    public function removeSpectateur(Spectateur $spectateur): self
    {
        if ($this->Spectateurs->contains($spectateur)) {
            $this->Spectateurs->removeElement($spectateur);
        }

        return $this;
    }
}
