<?php

namespace App\Entity;

use ApiPlatform\Doctrine\Orm\Filter\OrderFilter;
use ApiPlatform\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Metadata\ApiFilter;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Post;
use App\Repository\PostsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PostsRepository::class)]
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
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $text;

    #[ORM\Column]
    private ?int $progress;

    #[ORM\Column(type: Types::DATETIMETZ_IMMUTABLE)]
    private ?\DateTimeImmutable $date_create;

    #[ORM\Column(type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $date_modify = null;

    #[ORM\ManyToOne(targetEntity: Goal::class, inversedBy: 'posts')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Goal $goal;

    #[ORM\OneToMany(mappedBy: 'posts', targetEntity: LikeConnection::class, orphanRemoval: true)]
    private Collection $likes;

    #[ORM\OneToMany(mappedBy: 'posts', targetEntity: Comment::class, orphanRemoval: true)]
    private iterable $comment;

    public function __construct()
    {
        $this->likes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(?string $text): void
    {
        $this->text = $text;
    }

    public function getProgress(): ?int
    {
        return $this->progress;
    }

    public function setProgress(?int $progress): void
    {
        $this->progress = $progress;
    }

    public function getDateCreate(): ?\DateTimeImmutable
    {
        return $this->date_create;
    }

    public function setDateCreate(?\DateTimeImmutable $date_create): void
    {
        $this->date_create = $date_create;
    }

    public function getDateModify(): ?\DateTimeImmutable
    {
        return $this->date_modify;
    }

    public function setDateModify(?\DateTimeImmutable $date_modify): void
    {
        $this->date_modify = $date_modify;
    }

    public function getGoal(): ?Goal
    {
        return $this->goal;
    }

    public function setGoal(?Goal $goal): void
    {
        $this->goal = $goal;
    }
    
    public function getLikes(): Collection
    {
        return $this->likes;
    }

    public function setLikes(Collection $likes): void
    {
        $this->likes = $likes;
    }

    public function getComment(): iterable
    {
        return $this->comment;
    }
    
    public function setComment(iterable $comment): void
    {
        $this->comment = $comment;
    }
}