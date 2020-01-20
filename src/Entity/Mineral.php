<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MineralRepository")
 */
class Mineral
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
     * @ORM\Column(type="string", length=500, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $propriety;

    /**
     * @ORM\Column(type="binary", nullable=true)
     */
    private $photo;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\hardness", inversedBy="minerals")
     */
    private $hardnesses;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\color", inversedBy="minerals")
     */
    private $colors;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\reload", inversedBy="minerals")
     */
    private $reloads;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\purification", inversedBy="minerals")
     */
    private $purifications;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\chakra", inversedBy="minerals")
     */
    private $chakras;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\user", inversedBy="minerals")
     */
    private $users;

    public function __construct()
    {
        $this->hardnesses = new ArrayCollection();
        $this->colors = new ArrayCollection();
        $this->reloads = new ArrayCollection();
        $this->purifications = new ArrayCollection();
        $this->chakras = new ArrayCollection();
        $this->users = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPropriety(): ?string
    {
        return $this->propriety;
    }

    public function setPropriety(string $propriety): self
    {
        $this->propriety = $propriety;

        return $this;
    }

    public function getPhoto()
    {
        return $this->photo;
    }

    public function setPhoto($photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * @return Collection|hardness[]
     */
    public function getHardnesses(): Collection
    {
        return $this->hardnesses;
    }

    public function addHardness(hardness $hardness): self
    {
        if (!$this->hardnesses->contains($hardness)) {
            $this->hardnesses[] = $hardness;
        }

        return $this;
    }

    public function removeHardness(hardness $hardness): self
    {
        if ($this->hardnesses->contains($hardness)) {
            $this->hardnesses->removeElement($hardness);
        }

        return $this;
    }

    /**
     * @return Collection|color[]
     */
    public function getColors(): Collection
    {
        return $this->colors;
    }

    public function addColor(color $color): self
    {
        if (!$this->colors->contains($color)) {
            $this->colors[] = $color;
        }

        return $this;
    }

    public function removeColor(color $color): self
    {
        if ($this->colors->contains($color)) {
            $this->colors->removeElement($color);
        }

        return $this;
    }

    /**
     * @return Collection|reload[]
     */
    public function getReloads(): Collection
    {
        return $this->reloads;
    }

    public function addReload(reload $reload): self
    {
        if (!$this->reloads->contains($reload)) {
            $this->reloads[] = $reload;
        }

        return $this;
    }

    public function removeReload(reload $reload): self
    {
        if ($this->reloads->contains($reload)) {
            $this->reloads->removeElement($reload);
        }

        return $this;
    }

    /**
     * @return Collection|purification[]
     */
    public function getPurifications(): Collection
    {
        return $this->purifications;
    }

    public function addPurification(purification $purification): self
    {
        if (!$this->purifications->contains($purification)) {
            $this->purifications[] = $purification;
        }

        return $this;
    }

    public function removePurification(purification $purification): self
    {
        if ($this->purifications->contains($purification)) {
            $this->purifications->removeElement($purification);
        }

        return $this;
    }

    /**
     * @return Collection|chakra[]
     */
    public function getChakras(): Collection
    {
        return $this->chakras;
    }

    public function addChakra(chakra $chakra): self
    {
        if (!$this->chakras->contains($chakra)) {
            $this->chakras[] = $chakra;
        }

        return $this;
    }

    public function removeChakra(chakra $chakra): self
    {
        if ($this->chakras->contains($chakra)) {
            $this->chakras->removeElement($chakra);
        }

        return $this;
    }

    /**
     * @return Collection|user[]
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(user $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
        }

        return $this;
    }

    public function removeUser(user $user): self
    {
        if ($this->users->contains($user)) {
            $this->users->removeElement($user);
        }

        return $this;
    }
}
