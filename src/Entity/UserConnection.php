<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use App\Controller\Subscriptions\SubscriberController;
use App\Controller\Subscriptions\SubscriptionsController;
use App\Controller\UserConnection\UserConnectionController;
use App\Repository\UserConnectionRepository;
use Doctrine\DBAL\Types\Types;
use Symfony\Component\Serializer\Annotation\Groups;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserConnectionRepository::class)]
#[ApiResource(operations: [
    new Get(),
    new Post(
        uriTemplate: "/user/find",
        controller: UserConnectionController::class,
        normalizationContext: ['groups' => ['read']],
        denormalizationContext: ['groups' => ['search']]),
    new Post(
        uriTemplate: "/user/getSubscriber",
        controller: SubscriberController::class,
        denormalizationContext: ['groups' => ['getSubscriber']]),
    new Post(
        uriTemplate: "/user/getSubscription",
        controller: SubscriptionsController::class,
        denormalizationContext: ['groups' => ['getSubscription']]),
    new GetCollection(),
    new Post(),
    new Delete(),
])]

class UserConnection
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['read'])]
    private ?int $id;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'user')]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(['search', 'getSubscriber'])]
    private ?User $user;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'follower')]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(['search', 'getSubscription'])]
    private ?User $follower;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateCreate;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): void
    {
        $this->user = $user;
    }

    public function getFollower(): ?User
    {
        return $this->follower;
    }

    public function setFollower(?User $follower): void
    {
        $this->follower = $follower;
    }

    public function getDateCreate(): ?\DateTimeInterface
    {
        return $this->dateCreate;
    }

    public function setDateCreate(\DateTimeInterface $dateCreate): void
    {
        $this->dateCreate = $dateCreate;
    }
}