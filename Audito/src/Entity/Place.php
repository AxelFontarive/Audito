<?php

namespace App\Entity;

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
}
