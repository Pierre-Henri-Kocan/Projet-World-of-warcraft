<?php

namespace App\Entity;

use App\Repository\EventRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EventRepository::class)
 */
class Event
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $log;

    /**
     * @ORM\ManyToMany(targetEntity=raid::class, inversedBy="events")
     */
    private $raid;

    /**
     * @ORM\ManyToMany(targetEntity=player::class, inversedBy="events")
     */
    private $player;

    /**
     * @ORM\ManyToMany(targetEntity=item::class, inversedBy="events")
     */
    private $item;

    public function __construct()
    {
        $this->raid = new ArrayCollection();
        $this->player = new ArrayCollection();
        $this->item = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getLog(): ?string
    {
        return $this->log;
    }

    public function setLog(?string $log): self
    {
        $this->log = $log;

        return $this;
    }

    /**
     * @return Collection<int, raid>
     */
    public function getRaid(): Collection
    {
        return $this->raid;
    }

    public function addRaid(raid $raid): self
    {
        if (!$this->raid->contains($raid)) {
            $this->raid[] = $raid;
        }

        return $this;
    }

    public function removeRaid(raid $raid): self
    {
        $this->raid->removeElement($raid);

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
        }

        return $this;
    }

    public function removeItem(item $item): self
    {
        $this->item->removeElement($item);

        return $this;
    }
}
