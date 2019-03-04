<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TypeSpectacleRepository")
 */
class TypeSpectacle
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
    private $LibelleType;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelleType(): ?string
    {
        return $this->LibelleType;
    }

    public function setLibelleType(string $LibelleType): self
    {
        $this->LibelleType = $LibelleType;

        return $this;
    }
}
