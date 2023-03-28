<?php

namespace App\Entity;

use ApiPlatform\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Doctrine\Orm\Filter\OrderFilter;
use ApiPlatform\Metadata\ApiFilter;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Post;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping as ORM;
use phpDocumentor\Reflection\Types\This;
use Symfony\Component\Serializer\Annotation\Groups;



/** A post
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

#[ApiFilter(OrderFilter::class, properties: ['date_create', 'likes.id'], arguments: ['orderParameterName' => 'order'])]
#[ApiFilter(SearchFilter::class, properties: ['goal.users' => 'exact'])]

class Posts
{


    /** The id of the post
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;


    /** The text of the post
     *
     * @ORM\Column(type="text")
     */
    private string $text;


    /** The progress of the post
     *
     * @ORM\Column(type="integer")
     */
    private int $progress;


    /** The goal of the post
     *
     * @ORM\ManyToOne(targetEntity="Goal", inversedBy="posts")
     * @ORM\JoinColumn(nullable=false)
     */
    private ?Goal $goal = null;

    /**
     *The date that the post was created
     *
     * @ORM\Column(type="datetimetz_immutable")
     */
    private $date_create;


    /**
     *The date that the post was modified
     *
     * @ORM\Column(type="datetimetz_immutable")
     */
    private $date_modify;


    /**
     * @var LikeConnection[] Available LikeConnections from this post
     *
     * @ORM\OneToMany(
     *     targetEntity="LikeConnection",
     *     mappedBy="posts",
     *     cascade={"persist", "remove"})
     */
    private iterable $likes;

    /**
     * @var Comment[] Available user from this goals
     *
     * @ORM\OneToMany(
     *     targetEntity="Comment",
     *     mappedBy="Comment",
     *     cascade={"persist", "remove"})
     */
    private iterable $comment;


    /**
     * @var int|null
     */

    public function __construct()
    {
        $this->posts = new ArrayCollection();
    }


    /**
     * @return int|null
     */
    public function getId(): int
    {
        return $this->id;
    }



    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function setText(string $text): void
    {
        $this->text = $text;
    }


    /**
     * @return int
     */
    public function getProgress(): int
    {
        return $this->progress;
    }

    /**
     * @param int|null $id
     */




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
     * @param int $progress
     */
    public function setProgress(int $progress): void
    {
        $this->progress = $progress;
    }

    /**
     * @return Goal|null
     */
    public function getGoalId(): ?Goal
    {
        return $this->goal;
    }

    /**
     * @param Goal|null $goal
     */
    public function setGoalId(?Goal $goal): void
    {
        $this->goal = $goal;
    }

    /**
     * @return iterable
     */
    public function getLikes(): iterable|ArrayCollection
    {
        return $this->likes;
    }

    /**
     * @return iterable
     */
    public function getComment(): iterable
    {
        return $this->comment;
    }


}