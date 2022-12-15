<?php

namespace App\Entity;

use App\Repository\PlayerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=PlayerRepository::class)
 */
class Player
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
     * @ORM\Column(type="string", length=30, columnDefinition="enum('Chaman', 'Chasseur', 'Chevalier de la mort', 'Démoniste', 'Druide', 'Guerrier', 'Mage', 'Paladin', 'Prêtre', 'Voleur')")
     * @Assert\NotBlank(message="Merci de remplir ce champs")
     */
    private $class;

    /**
     * @ORM\Column(type="float")
     * @Assert\NotBlank(message="Merci de remplir ce champs")
     */
    private $score;

    /**
     * @ORM\Column(type="string", length=30, columnDefinition="enum('Demi', 'Galopin', 'Sérieux')")
     * @Assert\NotBlank(message="Merci de remplir ce champs")
     */
    private $rank;

    /**
     * @ORM\Column(type="boolean")
     * @Assert\NotBlank(message="Merci de remplir ce champs")
     */
    private $isActif;

    /**
     * @ORM\Column(type="string", length=64)
     * @Assert\NotBlank(message="Merci de remplir ce champs")
     */
    private $slug;

    /**
     * @ORM\ManyToMany(targetEntity=Item::class, mappedBy="player")
     */
    private $items;

    /**
     * @ORM\ManyToMany(targetEntity=Event::class, mappedBy="player")
     */
    private $events;

    /**
     * @ORM\ManyToOne(targetEntity=Role::class, inversedBy="players")
     * @ORM\JoinColumn(nullable=false)
     * @Assert\NotBlank(message="Merci de remplir ce champs")
     */
    private $role;

    /**
     * @ORM\ManyToMany(targetEntity=Raid::class, mappedBy="player")
     */
    private $raids;

    public function __construct()
    {
        $this->items = new ArrayCollection();
        $this->events = new ArrayCollection();
        $this->raids = new ArrayCollection();
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

    public function getClass(): ?string
    {
        return $this->class;
    }

    public function setClass(string $class): self
    {
        $this->class = $class;

        return $this;
    }

    public function getScore(): ?float
    {
        return $this->score;
    }

    public function setScore(float $score): self
    {
        $this->score = $score;

        return $this;
    }

    public function getRank(): ?string
    {
        return $this->rank;
    }

    public function setRank(string $rank): self
    {
        $this->rank = $rank;

        return $this;
    }

    public function isIsActif(): ?bool
    {
        return $this->isActif;
    }

    public function setIsActif(bool $isActif): self
    {
        $this->isActif = $isActif;

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
     * @return Collection<int, Item>
     */
    public function getItems(): Collection
    {
        return $this->items;
    }

    public function addItem(Item $item): self
    {
        if (!$this->items->contains($item)) {
            $this->items[] = $item;
            $item->addPlayer($this);
        }

        return $this;
    }

    public function removeItem(Item $item): self
    {
        if ($this->items->removeElement($item)) {
            $item->removePlayer($this);
        }

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
            $event->addPlayer($this);
        }

        return $this;
    }

    public function removeEvent(Event $event): self
    {
        if ($this->events->removeElement($event)) {
            $event->removePlayer($this);
        }

        return $this;
    }

    public function getRole(): ?role
    {
        return $this->role;
    }

    public function setRole(?role $role): self
    {
        $this->role = $role;

        return $this;
    }

    /**
     * @return Collection<int, Raid>
     */
    public function getRaids(): Collection
    {
        return $this->raids;
    }

    public function addRaid(Raid $raid): self
    {
        if (!$this->raids->contains($raid)) {
            $this->raids[] = $raid;
            $raid->addPlayer($this);
        }

        return $this;
    }

    public function removeRaid(Raid $raid): self
    {
        if ($this->raids->removeElement($raid)) {
            $raid->removePlayer($this);
        }

        return $this;
    }
}
