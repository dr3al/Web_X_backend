<?php

namespace App\Entity;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;


/** A likeconnection
 *
 * @ORM\Entity
 */
#[ApiResource(operations: [
    new Get(),
    new GetCollection(),
    new Post(),
    new Delete(),
])]
class LikeConnection
{
    /** The id of the LikeConnection
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;


    /** The LikeConnection of the post
     *
     * @ORM\ManyToOne(targetEntity="Posts", inversedBy="like_connection")
     * @ORM\JoinColumn(nullable=false)
     */
    private ?Posts $posts = null;


    /** The LikeConnection of the user
     *
     * @ORM\ManyToOne(targetEntity="User", inversedBy="like_connection")
     * @ORM\JoinColumn(nullable=false)
     */
    private ?User $users = null;



    /**
     *The date that the LikeConnection was created
     *
     * @ORM\Column(type="datetimetz_immutable")
     */
    private $date_create;




    /**
     * @return int|null
     */
    public function getId(): int
    {
        return $this->id;
    }


    /**
     * @return Posts|null
     */
    public function getPosts(): ?Posts
    {
        return $this->posts;
    }


    /**
     * @param Posts|null $posts
     */
    public function setPosts(?Posts $posts): void
    {
        $this->posts = $posts;
    }

    /**
     * @return User|null
     */
    public function getUsers(): ?User
    {
        return $this->users;
    }

    /**
     * @param User|null $users
     */
    public function setUsers(?User $users): void
    {
        $this->users = $users;
    }





    /**
     * @return \DateTimeInterface|null
     */
    public function getDateCreate(): ?\DateTimeInterface
    {
        return $this->date_create;
    }

    /**
     * @param \DateTimeInterface|null $date_create
     */
    public function setDateCreate(?\DateTimeInterface $date_create): void
    {
        $this->date_create = $date_create;
    }

}