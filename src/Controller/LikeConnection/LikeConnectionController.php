<?php
namespace App\Controller\LikeConnection;

use App\Entity\LikeConnection;
use Doctrine\ORM\EntityManagerInterface;
use ErrorException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class LikeConnectionController extends AbstractController
{
    /**
     * @param EntityManagerInterface $entityManager
     */
    public function __construct (
        private readonly EntityManagerInterface  $entityManager
    )
    {}

    /**
     * Метод получает id записи LikeConnection, связывающей пользователя и пост, по их id.
     *
     * @param mixed $data
     * @return LikeConnection|null
     * @throws ErrorException
     */
    public function __invoke(mixed $data): ?LikeConnection
    {
        $likeConnection = $this->entityManager->getRepository(LikeConnection::class)->findOneBy([
            'users' => $data->getUsers()->getId(),
            'posts' => $data->getPosts()->getId()
        ]);

        if (!$likeConnection) {
            throw new ErrorException("Not found connection", 404);
        }
        return $likeConnection;
    }
}