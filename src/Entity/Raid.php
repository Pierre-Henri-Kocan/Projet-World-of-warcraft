<?php

namespace App\Entity;

use App\Repository\RaidRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RaidRepository::class)
 */
class Raid
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
<<<<<<< HEAD
     * @ORM\ManyToMany(targetEntity=Event::class, mappedBy="raid")
     */
    private $events;

    /**
     * @ORM\OneToMany(targetEntity=Item::class, mappedBy="raid")
     */
    private $item;

    /**
     * @ORM\ManyToMany(targetEntity=Player::class, inversedBy="raids")
     */
    private $player;

    public function __construct()
    {
        $this->events = new ArrayCollection();
        $this->item = new ArrayCollection();
        $this->player = new ArrayCollection();
    }
=======
     * @ORM\Column(type="string", length=64)
     */
    private $slug;
>>>>>>> entities

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

<<<<<<< HEAD
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
            $event->addRaid($this);
        }

        return $this;
    }

    public function removeEvent(Event $event): self
    {
        if ($this->events->removeElement($event)) {
            $event->removeRaid($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, item>
     */
    public function getItem(): Collection
    {
        return $this->item;
    }

    public function addItem(item $item): self
    {
        if (!$this->item->contains($item)) {
            $this->item[] = $item;
            $item->setRaid($this);
        }

        return $this;
    }

    public function removeItem(item $item): self
    {
        if ($this->item->removeElement($item)) {
            // set the owning side to null (unless already changed)
            if ($item->getRaid() === $this) {
                $item->setRaid(null);
            }
        }

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
=======
    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;
>>>>>>> entities

        return $this;
    }
}
