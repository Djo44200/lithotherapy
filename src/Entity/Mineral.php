<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

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
     * @var string
     * @ORM\Column(name="img", type="string", nullable=true)
     * @Assert\File(
     *     mimeTypes={"image/png" ,"image/jpg","image/jpeg"},
     *     mimeTypesMessage = "Svp inserer une image valide (png,jpg,jpeg)")
     */
    private $photo;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Hardness", inversedBy="minerals")
     */
    private $hardnesses;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Color", inversedBy="minerals")
     */
    private $colors;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Reload", inversedBy="minerals")
     */
    private $reloads;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Purification", inversedBy="minerals")
     */
    private $purifications;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Chakra", inversedBy="minerals")
     */
    private $chakras;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\User", inversedBy="minerals")
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

    /**
     * @param ArrayCollection $hardnesses
     */
    public function setHardnesses(ArrayCollection $hardnesses): void
    {
        $this->hardnesses = $hardnesses;
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
