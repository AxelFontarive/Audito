<?php

namespace App\Entity;

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
}
