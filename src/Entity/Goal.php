<?php

namespace App\Entity;

use ApiPlatform\Doctrine\Common\Filter\SearchFilterInterface;
use ApiPlatform\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Metadata\ApiFilter;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Post;
use App\Repository\GoalRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GoalRepository::class)]
#[ApiResource(operations: [
    new Get(),
    new GetCollection(),
    new Post(),
    new Delete(),
    new Patch()
])]
#[ApiFilter(
    SearchFilter:: class,
    properties:[
        'name' => SearchFilterInterface:: STRATEGY_PARTIAL,
        'description' => SearchFilterInterface:: STRATEGY_PARTIAL,
        'users' => SearchFilterInterface::STRATEGY_EXACT
    ]
)]
class Goal
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id;

    #[ORM\Column(length: 50)]
    private ?string $name;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description;

    #[ORM\Column(type: Types::DATETIMETZ_IMMUTABLE)]
    private ?\DateTimeImmutable $date_create;

    #[ORM\Column(type: Types::DATETIMETZ_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $date_modify = null;

    #[ORM\ManyToOne(inversedBy: 'goal')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $users = null;

    #[ORM\OneToMany(mappedBy: 'goal', targetEntity: Posts::class, orphanRemoval: true)]
    private Collection $posts;

    public function __construct()
    {
        $this->posts = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

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

    public function getUsers(): ?User
    {
        return $this->users;
    }

    public function setUsers(?User $users): self
    {
        $this->users = $users;

        return $this;
    }

    /**
     * @return Collection<int, Posts>
     */
    public function getPosts(): Collection
    {
        return $this->posts;
    }

//    public function addPost(Posts $post): self
//    {
//        if (!$this->posts->contains($post)) {
//            $this->posts->add($post);
//            $post->setGoal($this);
//        }
//
//        return $this;
//    }
//
//    public function removePost(Posts $post): self
//    {
//        if ($this->posts->removeElement($post)) {
//            // set the owning side to null (unless already changed)
//            if ($post->getGoal() === $this) {
//                $post->setGoal(null);
//            }
//        }
//
//        return $this;
//    }
}
