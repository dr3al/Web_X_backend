<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Post;
use App\Controller\User\RegistrationController;
use App\Controller\User\ResetPasswordController;
use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\Annotation\Groups;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ApiResource(operations: [
    new Get(),
    new GetCollection(),
    new Post(
        uriTemplate: "/user/reset",
        controller: ResetPasswordController::class,
        normalizationContext: ['groups'=>['email']],
        denormalizationContext: ['groups'=>['email']]),
    new Post(
        uriTemplate: "/user/register",
        controller: RegistrationController::class,
        denormalizationContext: ['groups'=>['register']]),
    new Delete(),
    new Patch()
])]

class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id;

    #[ORM\Column(length: 40)]
    #[Groups(['register'])]
    private ?string $username;

    #[ORM\Column(length: 255)]
    #[Groups(['register'])]
    private ?string $password;

    #[ORM\Column(length: 40)]
    #[Groups(['email', 'register'])]
    private ?string $email;

    #[ORM\Column(length: 20)]
    #[Groups(['register'])]
    private ?string $firstName;

    #[ORM\Column(length: 20)]
    #[Groups(['register'])]
    private ?string $lastName;

    #[ORM\Column(type: Types::ARRAY)]
    private array $roles = [];

    #[ORM\OneToMany(targetEntity: UserConnection::class, mappedBy: 'user', orphanRemoval: true)]
    private Collection $user;

    #[ORM\OneToMany(targetEntity: UserConnection::class, mappedBy: 'follower', orphanRemoval: true)]
    private Collection $follower;

    #[ORM\OneToMany(targetEntity: Goal::class, mappedBy: 'users', orphanRemoval: true)]
    private Collection $goal;

    #[ORM\OneToMany(targetEntity: LikeConnection::class, mappedBy: 'users', orphanRemoval: true)]
    private Collection $likes;

    #[ORM\Column(type: Types::DATETIMETZ_IMMUTABLE)]
    #[Groups(['register'])]
    private ?\DateTimeImmutable $dateCreate;

    #[ORM\Column(type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    #[Groups(['register'])]
    private ?\DateTimeImmutable $dateModify = null;

    public function __construct()
    {
        $this->user = new ArrayCollection();
        $this->follower = new ArrayCollection();
        $this->goal = new ArrayCollection();
        $this->likes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    public function getRoles(): array
    {
        return $this->roles;
    }

    public function setRoles(array $roles): void
    {
        $this->roles = $roles;
    }

    public function getUserConnection(): Collection
    {
        return $this->user;
    }

    public function getFollower(): Collection
    {
        return $this->follower;
    }

    public function getGoal(): Collection
    {
        return $this->goal;
    }

    public function getLikes(): Collection
    {
        return $this->likes;
    }

    public function getDateCreate(): ?\DateTimeImmutable
    {
        return $this->dateCreate;
    }

    public function setDateCreate(\DateTimeImmutable $dateCreate): void
    {
        $this->dateCreate = $dateCreate;
    }

    public function getDateModify(): ?\DateTimeImmutable
    {
        return $this->dateModify;
    }

    public function setDateModify(?\DateTimeImmutable $dateModify): void
    {
        $this->dateModify = $dateModify;
    }

    public function eraseCredentials()
    {}

    public function getUserIdentifier(): string
    {
        return $this->id;
    }
}