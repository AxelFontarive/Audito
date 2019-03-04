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
}
