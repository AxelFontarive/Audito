<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PlaceRepository")
 */
class Place
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=15)
     */
    private $CategoriePlace;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $NumeroPlace;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Billet", mappedBy="Place")
     */
    private $Billets;

    public function __construct()
    {
        $this->Billets = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCategoriePlace(): ?string
    {
        return $this->CategoriePlace;
    }

    public function setCategoriePlace(string $CategoriePlace): self
    {
        $this->CategoriePlace = $CategoriePlace;

        return $this;
    }

    public function getNumeroPlace(): ?string
    {
        return $this->NumeroPlace;
    }

    public function setNumeroPlace(string $NumeroPlace): self
    {
        $this->NumeroPlace = $NumeroPlace;

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
            $billet->setPlace($this);
        }

        return $this;
    }

    public function removeBillet(Billet $billet): self
    {
        if ($this->Billets->contains($billet)) {
            $this->Billets->removeElement($billet);
            // set the owning side to null (unless already changed)
            if ($billet->getPlace() === $this) {
                $billet->setPlace(null);
            }
        }

        return $this;
    }
}
