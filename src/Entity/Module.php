<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\ModuleRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiSubresource;
use Symfony\Component\Serializer\Annotation\Groups;


/**
 * @ApiResource(
 * normalizationContext={"groups"={"module"}}
 * )
 * @ORM\Entity(repositoryClass=ModuleRepository::class)
 * 
 */
class Module
{
    /**
     * @Groups({"module"})
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * 
     */
    private $id;

    /**
     * 
     * @ORM\Column(type="string", length=255)
     * @Groups({"module"})
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity=Topic::class, inversedBy="modules")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"module"})
     */
    private $topic;

    /**
     * @ORM\ManyToOne(targetEntity=Image::class, inversedBy="modules")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"module"})
     */
    private $image;

    /**
     * @ORM\ManyToOne(targetEntity=Difficulty::class, inversedBy="modules")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"module"})
     */
    private $difficulty;

    /**
     * @ORM\OneToMany(targetEntity=Session::class, mappedBy="module")
     * @Groups({"module"})
     */
    private $sessions;

    public function __construct()
    {
        $this->sessions = new ArrayCollection();
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

    public function getTopic(): ?Topic
    {
        return $this->topic;
    }

    public function setTopic(?Topic $topic): self
    {
        $this->topic = $topic;

        return $this;
    }

    public function getImage(): ?Image
    {
        return $this->image;
    }

    public function setImage(?Image $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getDifficulty(): ?Difficulty
    {
        return $this->difficulty;
    }

    public function setDifficulty(?Difficulty $difficulty): self
    {
        $this->difficulty = $difficulty;

        return $this;
    }

    /**
     * @return Collection|Session[]
     */
    public function getSessions(): Collection
    {
        return $this->sessions;
    }

    public function addSession(Session $session): self
    {
        if (!$this->sessions->contains($session)) {
            $this->sessions[] = $session;
            $session->setModule($this);
        }

        return $this;
    }

    public function removeSession(Session $session): self
    {
        if ($this->sessions->contains($session)) {
            $this->sessions->removeElement($session);
            // set the owning side to null (unless already changed)
            if ($session->getModule() === $this) {
                $session->setModule(null);
            }
        }

        return $this;
    }
}
