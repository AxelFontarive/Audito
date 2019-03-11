<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TypeSpectacle")
     */
    private $TypeSpectacle;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Representation", mappedBy="Spectacle")
     */
    private $Representations;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image;

    public function __construct()
    {
        $this->Representations = new ArrayCollection();
    }

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

    public function getTypeSpectacle(): ?TypeSpectacle
    {
        return $this->TypeSpectacle;
    }

    public function setTypeSpectacle(?TypeSpectacle $TypeSpectacle): self
    {
        $this->TypeSpectacle = $TypeSpectacle;

        return $this;
    }

    /**
     * @return Collection|Representation[]
     */
    public function getRepresentations(): Collection
    {
        return $this->Representations;
    }

    public function addRepresentation(Representation $representation): self
    {
        if (!$this->Representations->contains($representation)) {
            $this->Representations[] = $representation;
            $representation->setSpectacle($this);
        }

        return $this;
    }

    public function removeRepresentation(Representation $representation): self
    {
        if ($this->Representations->contains($representation)) {
            $this->Representations->removeElement($representation);
            // set the owning side to null (unless already changed)
            if ($representation->getSpectacle() === $this) {
                $representation->setSpectacle(null);
            }
        }

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }
}
