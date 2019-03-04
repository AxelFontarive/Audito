<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SpectacleRepository")
 */
class Spectacle
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $NomSpectacle;

    /**
     * @ORM\Column(type="boolean")
     */
    private $ModulationScene;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomSpectacle(): ?string
    {
        return $this->NomSpectacle;
    }

    public function setNomSpectacle(string $NomSpectacle): self
    {
        $this->NomSpectacle = $NomSpectacle;

        return $this;
    }

    public function getModulationScene(): ?bool
    {
        return $this->ModulationScene;
    }

    public function setModulationScene(bool $ModulationScene): self
    {
        $this->ModulationScene = $ModulationScene;

        return $this;
    }
}
