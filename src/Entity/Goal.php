<?php

namespace App\Entity;
use ApiPlatform\Doctrine\Common\Filter\SearchFilterInterface;
use ApiPlatform\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Metadata\ApiFilter;
use ApiPlatform\Metadata\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Post;
use Doctrine\ORM\Mapping as ORM;

/** A goal
 *
 * @ORM\Entity
 */
#[ApiResource(operations: [
    new Get(),
    new GetCollection(),
    new Post(),
    new Delete(),
    new Patch()
])]

class Goal
{
    /** The id of the goal
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;



    /** The name of the goal
     *
     * @ORM\Column(type="string", length=50, options={"fixed" = false})
     */
    private string $name;



    /** The description of the goal
     *
     * @ORM\Column(type="text")
     */
    private string $description;


    /** The user of the goal
     *
     * @ORM\ManyToOne(targetEntity="User", inversedBy="goal")
     * @ORM\JoinColumn(nullable=false)
     */
    private ?User $users = null;


    /**
     *The date that the goal was created
     *
     * @ORM\Column(type="datetimetz_immutable")
     */
    private $date_create;


    /**
     *The date that the goal was modified
     *
     * @ORM\Column(type="datetimetz_immutable")
     */
    private $date_modify = null;


    /**
     * @var Posts[] Available posts from this goal
     *
     * @ORM\OneToMany(
     *     targetEntity="Posts",
     *     mappedBy="goal",
     *     cascade={"persist", "remove"})
     */
    private iterable $posts;

    public function __construct()
    {
        $this->posts = new ArrayCollection();
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
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

    /**
     * @return \DateTimeInterface|null
     */
    public function getDateModify(): ?\DateTimeInterface
    {
        return $this->date_modify;
    }

    /**
     * @param \DateTimeInterface|null $date_modify
     */
    public function setDateModify(?\DateTimeInterface $date_modify): void
    {
        $this->date_modify = $date_modify;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return iterable
     */
    public function getPosts(): iterable|ArrayCollection
    {
        return $this->posts;
    }



}