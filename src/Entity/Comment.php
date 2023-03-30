<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;


/** A Comment
 *
 * @ORM\Entity
 */
#[ApiResource(operations: [
    new Get(),
    new GetCollection(),
    new Post(),
    new Delete(),
])]

class Comment
{
    /** The id of the Comment
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */

    private int $id;

    /** The text of the comment
     *
     * @ORM\Column(type="text")
     */
    private string $text;


    /** The comment of the post
     *
     * @ORM\ManyToOne(targetEntity="Posts", inversedBy="comment")
     * @ORM\JoinColumn(nullable=false)
     */

    private ?Posts $post = null;


    /**
     * The comment that this comment replies to
     *
     * @ORM\ManyToOne(targetEntity="Comment", inversedBy="replies")
     * @ORM\JoinColumn(nullable=true)
     */
    private ?Comment $reply = null;


    /**
     *The date that the comment was created
     *
     * @ORM\Column(type="datetimetz_immutable")
     */
    private $date_create;

    /**
     *The date that the comment was modified
     *
     * @ORM\Column(type="datetimetz_immutable")
     */
    private $date_modify;


    /**
     * The replies to this comment
     *
     * @var Comment[]
     * @ORM\OneToMany(targetEntity="Comment", mappedBy="reply", cascade={"persist", "remove"})
     */
    private iterable $replies;

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
     * @return Posts|null
     */
    public function getPost(): ?Posts
    {
        return $this->post;
    }

    /**
     * @param Posts|null $post
     */
    public function setPost(?Posts $post): void
    {
        $this->post = $post;
    }

    /**
     * @return Comment|null
     */
    public function getReply(): ?Comment
    {
        return $this->reply;
    }

    /**
     * @param Comment|null $reply
     */
    public function setReply(?Comment $reply): void
    {
        $this->reply = $reply;
    }

    /**
     * @return iterable
     */
    public function getReplies(): iterable
    {
        return $this->replies;
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


}


