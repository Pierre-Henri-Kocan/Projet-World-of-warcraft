<?php

namespace App\Entity;

use App\Repository\LootHistoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LootHistoryRepository::class)
 */
class LootHistory
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=Event::class, cascade={"persist", "remove"})
     */
    private $Event;

    /**
     * @ORM\OneToOne(targetEntity=Player::class, cascade={"persist", "remove"})
     */
    private $Player;

    /**
     * @ORM\ManyToOne(targetEntity=Item::class, inversedBy="lootHistory")
     */
    private $Item;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEvent(): ?Event
    {
        return $this->Event;
    }

    public function setEvent(?Event $Event): self
    {
        $this->Event = $Event;

        return $this;
    }

    public function getPlayer(): ?Player
    {
        return $this->Player;
    }

    public function setPlayer(?Player $Player): self
    {
        $this->Player = $Player;

        return $this;
    }

    /**
     * @return Collection<int, Item>
     */
    public function getItem(): Collection
    {
        return $this->Item;
    }

    public function addItem(Item $item): self
    {
        if (!$this->Item->contains($item)) {
            $this->Item[] = $item;
            $item->setLootHistory($this);
        }

        return $this;
    }

    public function removeItem(Item $item): self
    {
        if ($this->Item->removeElement($item)) {
            // set the owning side to null (unless already changed)
            if ($item->getLootHistory() === $this) {
                $item->setLootHistory(null);
            }
        }

        return $this;
    }
}
