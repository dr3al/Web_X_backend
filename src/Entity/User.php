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
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ApiResource(operations: [
    new Get(),
    new GetCollection(),
    new Post(
        uriTemplate: "/user/reset",
        controller: ResetPasswordController::class,
        normalizationContext: ['groups'=>['email']],
        denormalizationContext: ['groups'=>['email']]
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
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id;

    #[ORM\Column(length: 40)]
    private ?string $username;

    #[ORM\Column(length: 255)]
    private ?string $password;

    #[ORM\Column(length: 40)]
    #[Groups(['email'])]
    private ?string $email;

    #[ORM\Column(length: 20)]
    private ?string $first_name;

    #[ORM\Column(length: 20)]
    private ?string $last_name;

    #[ORM\Column(type: Types::ARRAY)]

    private array $roles = [];

    #[ORM\Column(type: Types::DATETIMETZ_IMMUTABLE)]
    private ?\DateTimeImmutable $date_create;

    #[ORM\Column(type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $date_modify = null;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: UserConnection::class, orphanRemoval: true)]
    private Collection $user;

    #[ORM\OneToMany(mappedBy: 'follower', targetEntity: UserConnection::class, orphanRemoval: true)]
    private Collection $follower;

    #[ORM\OneToMany(mappedBy: 'users', targetEntity: Goal::class, orphanRemoval: true)]
    private Collection $goal;

    #[ORM\OneToMany(mappedBy: 'users', targetEntity: LikeConnection::class, orphanRemoval: true)]
    private Collection $likes;

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

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->first_name;
    }

    public function setFirstName(string $first_name): self
    {
        $this->first_name = $first_name;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->last_name;
    }

    public function setLastName(string $last_name): self
    {
        $this->last_name = $last_name;

        return $this;
    }

    public function getRoles(): array
    {
        return $this->roles;
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    public function getDateCreate(): ?\DateTimeImmutable
    {
        return $this->date_create;
    }

    public function setDateCreate(\DateTimeImmutable $date_create): self
    {
        $this->date_create = $date_create;

        return $this;
    }

    public function getDateModify(): ?\DateTimeImmutable
    {
        return $this->date_modify;
    }

    public function setDateModify(?\DateTimeImmutable $date_modify): self
    {
        $this->date_modify = $date_modify;

        return $this;
    }

    /**
     * @return Collection<int, UserConnection>
     */
    public function getUserConnection(): Collection
    {
        return $this->user;
    }

//    public function addUserConnection(UserConnection $userConnection): self
//    {
//        if (!$this->user->contains($userConnection)) {
//            $this->user->add($userConnection);
//            $userConnection->setUser($this);
//        }
//
//        return $this;
//    }
//
//    public function removeUserConnection(UserConnection $userConnection): self
//    {
//        if ($this->user->removeElement($userConnection)) {
//            // set the owning side to null (unless already changed)
//            if ($userConnection->getUser() === $this) {
//                $userConnection->setUser(null);
//            }
//        }
//
//        return $this;
//    }

    /**
     * @return Collection<int, UserConnection>
     */
    public function getFollower(): Collection
    {
        return $this->follower;
    }

//    public function addFollower(UserConnection $follower): self
//    {
//        if (!$this->follower->contains($follower)) {
//            $this->follower->add($follower);
//            $follower->setFollower($this);
//        }
//
//        return $this;
//    }
//
//    public function removeFollower(UserConnection $follower): self
//    {
//        if ($this->follower->removeElement($follower)) {
//            // set the owning side to null (unless already changed)
//            if ($follower->getFollower() === $this) {
//                $follower->setFollower(null);
//            }
//        }
//
//        return $this;
//    }

    /**
     * @return Collection<int, Goal>
     */
    public function getGoal(): Collection
    {
        return $this->goal;
    }

//    public function addGoal(Goal $goal): self
//    {
//        if (!$this->goal->contains($goal)) {
//            $this->goal->add($goal);
//            $goal->setUsers($this);
//        }
//
//        return $this;
//    }
//
//    public function removeGoal(Goal $goal): self
//    {
//        if ($this->goal->removeElement($goal)) {
//            // set the owning side to null (unless already changed)
//            if ($goal->getUsers() === $this) {
//                $goal->setUsers(null);
//            }
//        }
//
//        return $this;
//    }

    /**
     * @return Collection<int, LikeConnection>
     */
    public function getLikes(): Collection
    {
        return $this->likes;
    }

//    public function addLike(LikeConnection $like): self
//    {
//        if (!$this->likes->contains($like)) {
//            $this->likes->add($like);
//            $like->setUsers($this);
//        }
//
//        return $this;
//    }
//
//    public function removeLike(LikeConnection $like): self
//    {
//        if ($this->likes->removeElement($like)) {
//            // set the owning side to null (unless already changed)
//            if ($like->getUsers() === $this) {
//                $like->setUsers(null);
//            }
//        }
//
//        return $this;
//    }

    public function eraseCredentials()
    {}

    public function getUserIdentifier(): string
    {
        return $this->id;
    }
}
