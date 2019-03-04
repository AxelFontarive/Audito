<?php

namespace App\Entity;

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
}
