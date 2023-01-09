<?php

namespace App\Entity;

use App\Repository\ItemRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=ItemRepository::class)
 */
class Item
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=64)
     * @Assert\NotBlank(message="Merci de remplir ce champs")
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=10)
     * @Assert\NotBlank(message="Merci de remplir ce champs")
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=64)
     */
    private $slug;

    /**  
     * @ORM\ManyToMany(targetEntity=Role::class, inversedBy="items")
     * @Assert\NotBlank(message="Merci de remplir ce champs")
     */
    private $role;

    /**
     * @ORM\ManyToMany(targetEntity=Player::class, inversedBy="items")
     */
    private $player;

    /**
     * @ORM\ManyToMany(targetEntity=Event::class, mappedBy="item")
     */
    private $events;

    /**
     * @ORM\ManyToOne(targetEntity=Raid::class, inversedBy="item")
     * @ORM\JoinColumn(nullable=false)
     * @Assert\NotBlank(message="Merci de remplir ce champs")
     */
    private $raid;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Merci de remplir ce champs")
     */
    private $detail;

    /**
     * @ORM\ManyToMany(targetEntity=Slot::class, mappedBy="item")
     * @Assert\NotBlank(message="Merci de remplir ce champs")
     */
    private $slots;

    public function __construct()
    {
        $this->role = new ArrayCollection();
        $this->player = new ArrayCollection();
        $this->events = new ArrayCollection();
        $this->slots = new ArrayCollection();
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

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * @return Collection<int, role>
     */
    public function getRole(): Collection
    {
        return $this->role;
    }

    public function addRole(role $role): self
    {
        if (!$this->role->contains($role)) {
            $this->role[] = $role;
        }

        return $this;
    }

    public function removeRole(role $role): self
    {
        $this->role->removeElement($role);

        return $this;
    }

    /**
     * @return Collection<int, player>
     */
    public function getPlayer(): Collection
    {
        return $this->player;
    }

    public function addPlayer(player $player): self
    {
        if (!$this->player->contains($player)) {
            $this->player[] = $player;
        }

        return $this;
    }

    public function removePlayer(player $player): self
    {
        $this->player->removeElement($player);

        return $this;
    }

    /**
     * @return Collection<int, Event>
     */
    public function getEvents(): Collection
    {
        return $this->events;
    }

    public function addEvent(Event $event): self
    {
        if (!$this->events->contains($event)) {
            $this->events[] = $event;
            $event->addItem($this);
        }

        return $this;
    }

    public function removeEvent(Event $event): self
    {
        if ($this->events->removeElement($event)) {
            $event->removeItem($this);
        }

        return $this;
    }

    public function getRaid(): ?Raid
    {
        return $this->raid;
    }

    public function setRaid(?Raid $raid): self
    {
        $this->raid = $raid;

        return $this;
    }

    public function getDetail(): ?string
    {
        return $this->detail;
    }

    public function setDetail(string $detail): self
    {
        $this->detail = $detail;

        return $this;
    }

    /**
     * @return Collection<int, Slot>
     */
    public function getSlots(): Collection
    {
        return $this->slots;
    }

    public function addSlot(Slot $slot): self
    {
        if (!$this->slots->contains($slot)) {
            $this->slots[] = $slot;
            $slot->addItem($this);
        }

        return $this;
    }

    public function removeSlot(Slot $slot): self
    {
        if ($this->slots->removeElement($slot)) {
            $slot->removeItem($this);
        }

        return $this;
    }

}