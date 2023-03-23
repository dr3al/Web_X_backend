<?php

namespace App\Controller\Subscriptions;


use App\Entity\User;
use App\Entity\UserConnection;
use Doctrine\ORM\EntityManagerInterface;
use ErrorException;
use phpDocumentor\Reflection\Types\Collection;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SubscriberController extends AbstractController
{
    /**
     * @param EntityManagerInterface $entityManager
     */
    public function __construct (
        private readonly EntityManagerInterface  $entityManager
    )
    {}

    /**
     *
     * @param mixed $data
     * @return array|Collection[]
     * @throws ErrorException
     */
    public function __invoke(mixed $data): array
    {
        dd($data->getId());
        $user = $this->entityManager->getRepository(UserConnection::class)->findBy([
            'user' => $data->getFollower(),
        ]);

        if (!$user) {
            throw new ErrorException("Not found Subscriptions", 404);
        }
        return $user;
    }
}