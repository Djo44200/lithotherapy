<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ChakraRepository")
 */
class Chakra
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Mineral", mappedBy="chakras")
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

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

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
            $mineral->addChakra($this);
        }

        return $this;
    }

    public function removeMineral(Mineral $mineral): self
    {
        if ($this->minerals->contains($mineral)) {
            $this->minerals->removeElement($mineral);
            $mineral->removeChakra($this);
        }

        return $this;
    }
}
