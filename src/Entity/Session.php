<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\SessionRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=SessionRepository::class)
 */
class Session
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     * @Groups({"module"})
     */
    private $date;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"module"})
     */
    private $last;

    /**
     * @ORM\ManyToOne(targetEntity=Module::class, inversedBy="sessions")
     * @ORM\JoinColumn(nullable=false)
     *
     */
    private $module;

    /**
     * @ORM\ManyToOne(targetEntity=Place::class, inversedBy="sessions")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"module"})
     */
    private $place;

    /**
     * @ORM\ManyToOne(targetEntity=Test::class, inversedBy="sessions")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"module"})
     */
    private $test;

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

    public function getLast(): ?int
    {
        return $this->last;
    }

    public function setLast(int $last): self
    {
        $this->last = $last;

        return $this;
    }

    public function getModule(): ?Module
    {
        return $this->module;
    }

    public function setModule(?Module $module): self
    {
        $this->module = $module;

        return $this;
    }

    public function getPlace(): ?Place
    {
        return $this->place;
    }

    public function setPlace(?Place $place): self
    {
        $this->place = $place;

        return $this;
    }

    public function getTest(): ?Test
    {
        return $this->test;
    }

    public function setTest(?Test $test): self
    {
        $this->test = $test;

        return $this;
    }
}
