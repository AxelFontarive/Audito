<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RepresentationRepository")
 */
class Representation
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $DateRepresentation;

    /**
     * @ORM\Column(type="datetime")
     */
    private $HeureDebut;

    /**
     * @ORM\Column(type="integer")
     */
    private $Duree;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Billet", mappedBy="Representation")
     */
    private $Billets;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Spectacle", inversedBy="Representations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Spectacle;

    public function __construct()
    {
        $this->Billets = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateRepresentation(): ?\DateTimeInterface
    {
        return $this->DateRepresentation;
    }

    public function setDateRepresentation(\DateTimeInterface $DateRepresentation): self
    {
        $this->DateRepresentation = $DateRepresentation;

        return $this;
    }

    public function getHeureDebut(): ?\DateTimeInterface
    {
        return $this->HeureDebut;
    }

    public function setHeureDebut(\DateTimeInterface $HeureDebut): self
    {
        $this->HeureDebut = $HeureDebut;

        return $this;
    }

    public function getDuree(): ?int
    {
        return $this->Duree;
    }

    public function setDuree(int $Duree): self
    {
        $this->Duree = $Duree;

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
            $billet->setRepresentation($this);
        }

        return $this;
    }

    public function removeBillet(Billet $billet): self
    {
        if ($this->Billets->contains($billet)) {
            $this->Billets->removeElement($billet);
            // set the owning side to null (unless already changed)
            if ($billet->getRepresentation() === $this) {
                $billet->setRepresentation(null);
            }
        }

        return $this;
    }

    public function getSpectacle(): ?Spectacle
    {
        return $this->Spectacle;
    }

    public function setSpectacle(?Spectacle $Spectacle): self
    {
        $this->Spectacle = $Spectacle;

        return $this;
    }
}
