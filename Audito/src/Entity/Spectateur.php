<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SpectateurRepository")
 */
class Spectateur
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
    private $NomSpectateur;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $PrenomSpectateur;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Abonnement", mappedBy="Spectateurs")
     */
    private $Abonnements;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Billet", mappedBy="Spectateur")
     */
    private $Billets;

    public function __construct()
    {
        $this->Abonnements = new ArrayCollection();
        $this->Billets = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomSpectateur(): ?string
    {
        return $this->NomSpectateur;
    }

    public function setNomSpectateur(string $NomSpectateur): self
    {
        $this->NomSpectateur = $NomSpectateur;

        return $this;
    }

    public function getPrenomSpectateur(): ?string
    {
        return $this->PrenomSpectateur;
    }

    public function setPrenomSpectateur(string $PrenomSpectateur): self
    {
        $this->PrenomSpectateur = $PrenomSpectateur;

        return $this;
    }

    /**
     * @return Collection|Abonnement[]
     */
    public function getAbonnements(): Collection
    {
        return $this->Abonnements;
    }

    public function addAbonnement(Abonnement $abonnement): self
    {
        if (!$this->Abonnements->contains($abonnement)) {
            $this->Abonnements[] = $abonnement;
            $abonnement->addSpectateur($this);
        }

        return $this;
    }

    public function removeAbonnement(Abonnement $abonnement): self
    {
        if ($this->Abonnements->contains($abonnement)) {
            $this->Abonnements->removeElement($abonnement);
            $abonnement->removeSpectateur($this);
        }

        return $this;
    }

    /**
     * @return Collection|Billet[]
     */
    public function getBillets(): Collection
    {
        return $this->Billets;
    }

    public function addBillet(Billet $billet): self
    {
        if (!$this->Billets->contains($billet)) {
            $this->Billets[] = $billet;
            $billet->setSpectateur($this);
        }

        return $this;
    }

    public function removeBillet(Billet $billet): self
    {
        if ($this->Billets->contains($billet)) {
            $this->Billets->removeElement($billet);
            // set the owning side to null (unless already changed)
            if ($billet->getSpectateur() === $this) {
                $billet->setSpectateur(null);
            }
        }

        return $this;
    }
}
