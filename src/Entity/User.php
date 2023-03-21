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
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\Annotation\Groups;

/** A user
 *
 * @ORM\Entity
 */
#[ApiResource(operations: [
    new Get(),
    new GetCollection(),
    new Post(
        uriTemplate: "/user/reset",
        controller: ResetPasswordController::class,
        denormalizationContext: ['groups'=>['email']],
        normalizationContext: ['groups'=>['email']]
    ),
    new Post(
        uriTemplate: "/user/register",
        controller: RegistrationController::class
    ),
    new Delete(),
    new Patch()
])]

class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    /** The id of the user
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /** The username of the user
     *
     * @ORM\Column(type="string", length=40, options={"fixed" = false}, unique=true)
     */
    private string $username;

    /** The password of the user
     *
     * @ORM\Column(type="string")
     */
    private string $password;

    /** The email of the user
     *
     * @ORM\Column(type="string", length=40, options={"fixed" = false}, unique=true)
     */
    #[Groups(['email'])]
    private string $email;

    /** The first_name of the user
     *
     * @ORM\Column(type="string", length=20, options={"fixed" = false})
     */
    private string $first_name;

    /** The last_name of the user
     *
     * @ORM\Column(type="string", length=20, options={"fixed" = false})
     */
    private string $last_name;

    /** The roles of the user
     *
     * @ORM\Column(type="array")
     */
    private array $roles;

    /**
     *The date that the user was created
     *
     * @ORM\Column(type="datetimetz_immutable")
     */
    private $date_create;

    /**
     *The date that the user was modified
     *
     * @ORM\Column(type="datetimetz_immutable")
     */
    private $date_modify;

    /**
     * @var Goal[] Available user from this goals
     *
     * @ORM\OneToMany(
     *     targetEntity="Goal",
     *     mappedBy="users",
     *     cascade={"persist", "remove"})
     */
    private iterable $goals;

    /**
     * @var LikeConnection[] Available user from this likeConnections
     *
     * @ORM\OneToMany(
     *     targetEntity="LikeConnection",
     *     mappedBy="users",
     *     cascade={"persist", "remove"})
     */
    private iterable $likes;

    /**
     * @var UserConnection[] Available user from this likeConnections
     *
     * @ORM\OneToMany(
     *     targetEntity="UserConnection",
     *     mappedBy="user",
     *     cascade={"persist", "remove"})
     */
    private iterable $user;

    /**
     * @var UserConnection[] Available user from this likeConnections
     *
     * @ORM\OneToMany(
     *     targetEntity="UserConnection",
     *     mappedBy="follower",
     *     cascade={"persist", "remove"})
     */
    private iterable $follower;

    public function __construct()
    {
        $this->likes = new ArrayCollection();
        $this->goals = new ArrayCollection();
        $this->user = new ArrayCollection();
        $this->follower = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->first_name;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->last_name;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getDateCreate(): ?\DateTimeInterface
    {
        return $this->date_create;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getDateModify(): ?\DateTimeInterface
    {
        return $this->date_modify;
    }

    /**
     * @param string $username
     */
    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @param string $first_name
     */
    public function setFirstName(string $first_name): void
    {
        $this->first_name = $first_name;
    }

    /**
     * @param string $last_name
     */
    public function setLastName(string $last_name): void
    {
        $this->last_name = $last_name;
    }

    /**
     * @param array $roles
     */
    public function setRoles(array $roles): void
    {
        $this->roles = $roles;
    }

    /**
     * @param \DateTimeInterface|null $date_create
     */
    public function setDateCreate(?\DateTimeInterface $date_create): void
    {
        $this->date_create = $date_create;
    }

    /**
     * @param \DateTimeInterface|null $date_modify
     */
    public function setDateModify(?\DateTimeInterface $date_modify): void
    {
        $this->date_modify = $date_modify;
    }

    /**
     * @return iterable
     */
    public function getGoals(): iterable|ArrayCollection
    {
        return $this->goals;
    }

    /**
     * @return iterable
     */
    public function getLikes(): iterable|ArrayCollection
    {
        return $this->likes;
    }

    public function getRoles(): array
    {
        return $this->roles;
    }

    public function eraseCredentials()
    {}

    public function getUserIdentifier(): string
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
}