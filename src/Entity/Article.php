<?php

namespace App\Entity;

use App\Repository\ArticleRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Attribute\Groups;

#[ORM\Entity(repositoryClass: ArticleRepository::class)]
class Article
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups('article')]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups('article')]
    private ?string $category = null;

    #[ORM\Column(length: 20, nullable: true)]
    #[Groups('article')]
    private ?string $price = null;

    #[ORM\Column]
    #[Groups('article')]
    private ?bool $stocked = null;

    #[ORM\Column(length: 255)]
    #[Groups('article')]
    private ?string $name = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(string $category): static
    {
        $this->category = $category;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(?string $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function isStocked(): ?bool
    {
        return $this->stocked;
    }

    public function setStocked(bool $stocked): static
    {
        $this->stocked = $stocked;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }
}
