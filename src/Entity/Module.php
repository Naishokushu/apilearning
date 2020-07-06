<?php

namespace App\Entity;

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
}
