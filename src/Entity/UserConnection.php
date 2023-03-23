<?php

namespace App\Entity;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use App\Controller\UserConnection\UserConnectionController;
use Symfony\Component\Serializer\Annotation\Groups;
use Doctrine\ORM\Mapping as ORM;

/** A UserConnection
 *
 * @ORM\Entity
 */
#[ApiResource(operations: [
    new Get(),
    new Post(
        uriTemplate: "/user/find",
        controller: UserConnectionController::class,
        normalizationContext: ['groups' => ['read']],
        denormalizationContext: ['groups' => ['search']]
    ),
    new GetCollection(),
    new Post(),
    new Delete(),
])]

class UserConnection
{
    /** The id of the UserConnection
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    #[Groups(['read'])]
    private int $id;

    /** The UserConnection of the user
     * @ORM\ManyToOne(targetEntity="User", inversedBy="user_connection")
     * @ORM\JoinColumn(nullable=false)
     */
    #[Groups(['search'])]
    private ?User $user;

    /** The UserConnection of the Follower
     * @ORM\ManyToOne(targetEntity="User", inversedBy="user_connection")
     * @ORM\JoinColumn(nullable=false)
     */
    #[Groups(['search'])]
    private ?User $follower;

    /** The date that the UserConnection was created
     * @ORM\Column(type="datetime")
     */
    private ?\DateTimeInterface $dateCreate;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return User|null
     */
    public function getUser(): ?User
    {
        return $this->user;
    }

    /**
     * @param User|null $User
     */

    public function setUser(User $user): void
    {
        $this->user = $user;

    }
    /**
     * @return User|null
     */
    public function getFollower(): ?User
    {
        return $this->follower;
    }

    /**
     * @param User|null $Follower
     */
    public function setFollower(User $follower): void
    {
        $this->follower = $follower;

    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getDateCreate(): ?\DateTimeInterface
    {
        return $this->dateCreate;
    }

    /**
     * @param \DateTimeInterface|null $date_create
     */
    public function setDateCreate(\DateTimeInterface $dateCreate): void
    {
        $this->dateCreate = $dateCreate;

    }
}
