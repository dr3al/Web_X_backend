<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use App\Controller\LikeConnection\LikeConnectionController;
use App\Repository\LikeConnectionRepository;
use Doctrine\DBAL\Types\Types;
use Symfony\Component\Serializer\Annotation\Groups;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LikeConnectionRepository::class)]
#[ApiResource(operations: [
    new Get(),
    new Post(
        uriTemplate: "/like/find",
        controller: LikeConnectionController::class,
        normalizationContext: ['groups' => ['read']],
        denormalizationContext: ['groups' => ['search']]),
    new GetCollection(),
    new Post(),
    new Delete(),
])]

class LikeConnection
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['read'])]
    private ?int $id;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'likes')]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(['search'])]
    private ?User $users;

    #[ORM\ManyToOne(targetEntity: Posts::class, inversedBy: 'likes')]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(['search'])]
    private ?Posts $posts;

    #[ORM\Column(type: Types::DATETIMETZ_IMMUTABLE)]
    private ?\DateTimeImmutable $dateCreate;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsers(): ?User
    {
        return $this->users;
    }

    public function setUsers(?User $users): void
    {
        $this->users = $users;
    }

    public function getPosts(): ?Posts
    {
        return $this->posts;
    }

    public function setPosts(?Posts $posts): void
    {
        $this->posts = $posts;
    }

    public function getDateCreate(): ?\DateTimeImmutable
    {
        return $this->dateCreate;
    }

    public function setDateCreate(\DateTimeImmutable $dateCreate): void
    {
        $this->dateCreate = $dateCreate;
    }
}