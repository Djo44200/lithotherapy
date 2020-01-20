<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\HardnessRepository")
 */
class Hardness
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $number;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Mineral", mappedBy="hardnesses")
     */
    private $minerals;

    public function __construct()
    {
        $this->minerals = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumber(): ?float
    {
        return $this->number;
    }

    public function setNumber(float $number): self
    {
        $this->number = $number;

        return $this;
    }

    /**
     * @return Collection|Mineral[]
     */
    public function getMinerals(): Collection
    {
        return $this->minerals;
    }

    public function addMineral(Mineral $mineral): self
    {
        if (!$this->minerals->contains($mineral)) {
            $this->minerals[] = $mineral;
            $mineral->addHardness($this);
        }

        return $this;
    }

    public function removeMineral(Mineral $mineral): self
    {
        if ($this->minerals->contains($mineral)) {
            $this->minerals->removeElement($mineral);
            $mineral->removeHardness($this);
        }

        return $this;
    }
}
