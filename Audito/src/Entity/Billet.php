<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BilletRepository")
 */
class Billet
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="decimal", precision=6, scale=2)
     */
    private $Tarif;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Spectateur", inversedBy="Billets")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Spectateur;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Place", inversedBy="Billets")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Place;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Representation", inversedBy="Billets")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Representation;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTarif()
    {
        return $this->Tarif;
    }

    public function setTarif($Tarif): self
    {
        $this->Tarif = $Tarif;

        return $this;
    }

    public function getSpectateur(): ?Spectateur
    {
        return $this->Spectateur;
    }

    public function setSpectateur(?Spectateur $Spectateur): self
    {
        $this->Spectateur = $Spectateur;

        return $this;
    }

    public function getPlace(): ?Place
    {
        return $this->Place;
    }

    public function setPlace(?Place $Place): self
    {
        $this->Place = $Place;

        return $this;
    }

    public function getRepresentation(): ?Representation
    {
        return $this->Representation;
    }

    public function setRepresentation(?Representation $Representation): self
    {
        $this->Representation = $Representation;

        return $this;
    }
}
