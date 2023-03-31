<?php

namespace App\Controller\UserConnection;

use App\Entity\UserConnection;
use Doctrine\ORM\EntityManagerInterface;
use ErrorException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UserConnectionController extends AbstractController
{
    /**
     * @param EntityManagerInterface $entityManager
     */
    public function __construct (
        private readonly EntityManagerInterface  $entityManager
    )
    {}

    /**
     * Метод получает id записи UserConnection, связывающей пользователя и подписчика, по их id.
     *
     * @param mixed $data
     * @return UserConnection|null
     */
    public function __invoke(mixed $data): ?UserConnection
    {
        $userConnection = $this->entityManager->getRepository(UserConnection::class)->findOneBy([
            'user' => $data->getUser()->getId(),
            'follower' => $data->getFollower()->getId()
        ]);

        if (!$userConnection) {
            throw new ErrorException("Not found connection", 404);
        }
        return $userConnection;
    }
}