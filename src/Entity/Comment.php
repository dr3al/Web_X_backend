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


    /** The comment of the comment
     *
     * @ORM\ManyToOne(targetEntity="Comment", inversedBy="comment")
     * @ORM\JoinColumn(nullable=false)
     */
    private ?Comment $comment = null;


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
     * @var Comment[] Available comment from this comment
     *
     * @ORM\OneToMany(
     *     targetEntity="Comment",
     *     mappedBy="comment",
     *     cascade={"persist", "remove"})
     */
    public iterable $comments;

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
    public function getPosts(): ?Posts
    {
        return $this->post;
    }

    /**
     * @param Posts|null $post
     */
    public function setPosts(?Posts $post): void
    {
        $this->post = $post;
    }

    /**
     * @return Comment|null
     */
    public function getComment(): ?Comment
    {
        return $this->comment;
    }

    /**
     * @param Comment|null $comment
     */
    public function setComment(?Comment $comment): void
    {
        $this->comment = $comment;
    }

    /**
     * @return mixed
     */
    public function getdate_create()
    {
        return $this->date_create;
    }

    /**
     * @param mixed $date_create
     */
    public function setdate_create($date_create): void
    {
        $this->date_create = $date_create;
    }

    /**
     * @return mixed
     */
    public function getdate_modify()
    {
        return $this->date_modify;
    }

    /**
     * @param mixed $date_modify
     */
    public function setdate_modify($date_modify): void
    {
        $this->date_modify = $date_modify;
    }

}


