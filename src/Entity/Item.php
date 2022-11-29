<?php

namespace App\Entity;

use App\Repository\ItemRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

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
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=10, columnDefinition="enum('Bis','Contested')")
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=64)
     */
    private $slug;

    /**  
     * @ORM\ManyToMany(targetEntity=Role::class, inversedBy="items")
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
     */
    private $raid;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $detail;

    /**
     * @ORM\OneToMany(targetEntity=Location::class, mappedBy="item")
     */
    private $locations;

    public function __construct()
    {
        $this->role = new ArrayCollection();
        $this->player = new ArrayCollection();
        $this->events = new ArrayCollection();
        $this->locations = new ArrayCollection();
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
     * @return Collection<int, Location>
     */
    public function getLocations(): Collection
    {
        return $this->locations;
    }

    public function addLocation(Location $location): self
    {
        if (!$this->locations->contains($location)) {
            $this->locations[] = $location;
            $location->setItem($this);
        }

        return $this;
    }

    public function removeLocation(Location $location): self
    {
        if ($this->locations->removeElement($location)) {
            // set the owning side to null (unless already changed)
            if ($location->getItem() === $this) {
                $location->setItem(null);
            }
        }

        return $this;
    }
}