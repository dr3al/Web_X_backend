<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\DBAL\Types\Types;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity()]
#[ApiResource(operations: [
    new Get(),
    new GetCollection(),
    new Post(),
    new Delete(),
])]

class Comment
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;

    #[ORM\Column(type: Types::TEXT)]
    private string $text;

    #[ORM\ManyToOne(targetEntity:Posts::class, inversedBy: 'comment')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Posts $posts = null;

    #[ORM\ManyToOne(targetEntity: Comment::class, inversedBy: 'replies')]
    #[ORM\JoinColumn(nullable: true)]
    private ?Comment $reply = null;

    #[ORM\OneToMany(targetEntity: Comment::class, mappedBy: 'reply', orphanRemoval: true)]
    private Collection $replies;

    #[ORM\Column(type: Types::DATETIMETZ_IMMUTABLE)]
    private ?\DateTimeImmutable $dateCreate;

    #[ORM\Column(type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $dateModify;

    public function __construct()
    {
        $this->replies = new ArrayCollection();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function setText(string $text): void
    {
        $this->text = $text;
    }

    public function getPost(): ?Posts
    {
        return $this->posts;
    }

    public function setPost(?Posts $posts): void
    {
        $this->posts = $posts;
    }

    public function getReply(): ?Comment
    {
        return $this->reply;
    }

    public function setReply(?Comment $reply): void
    {
        $this->reply = $reply;
    }

    public function getReplies(): iterable
    {
        return $this->replies;
    }

    public function getDateCreate()
    {
        return $this->dateCreate;
    }

    public function setDateCreate($dateCreate): void
    {
        $this->dateCreate = $dateCreate;
    }

    public function getDateModify()
    {
        return $this->dateModify;
    }

    public function setDateModify($dateModify): void
    {
        $this->dateModify = $dateModify;
    }
}