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

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Spectacle")
     */
    private $Spectacles;

    public function __construct()
    {
        $this->Spectacles = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
