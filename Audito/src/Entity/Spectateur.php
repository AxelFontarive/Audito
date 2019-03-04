<?php

namespace App\Entity;

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
}
