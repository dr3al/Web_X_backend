<?php

namespace App\Repository;
use Doctrine\ORM\EntityRepository;
use App\Entity\User;
use App\Entity\Posts;
use App\Entity\LikeConnection;
use App\Entity\Goal;

class PostFilter extends EntityRepository
{
    /**
     * @param string $username
     * @param string $text
     * @param string $likeId
     * @param string $description
     * @return User[]
     * @return Posts[]
     * @return LikeConnection[]
     * @return Goal[]
     */
    public function findByUser(string $username, string $text, string $likeId, string $description): array
    {
        return $this->findBy([
            'user' => $username
        ]);
    }
    public function findAllOrderedByName()
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT * FROM webdev ORDER BY date_create DESC'
            )
            ->getResult();
    }

}