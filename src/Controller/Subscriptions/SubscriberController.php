<?php

namespace App\Controller\Subscriptions;


use App\Entity\User;
use App\Entity\UserConnection;
use Doctrine\ORM\EntityManagerInterface;
use ErrorException;
use phpDocumentor\Reflection\Types\Collection;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\JsonResponse;

class SubscriberController extends AbstractController
{
    public function __construct(private readonly EntityManagerInterface $entityManager)
    {}

    public function __invoke(mixed $data): JsonResponse
    {
        $subscribers = $this->entityManager->getRepository(UserConnection::class)->findBy([
            'user' => $data->getUser()->getId(),
        ]);

        if (!$subscribers) {
            throw new NotFoundHttpException('No subscribers found for the given user');
        }

        $followerList = [];

        foreach ($subscribers as &$subscriber) {
            $follower = $subscriber->getFollower()->getId();

            if ($follower) {
                $followerList[] = $follower;
            }
        }


        return new JsonResponse($followerList);
    }
}