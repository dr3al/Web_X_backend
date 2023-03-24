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

class SubscriptionsController extends AbstractController
{
    public function __construct(private readonly EntityManagerInterface $entityManager)
    {}

    public function __invoke(mixed $data): JsonResponse
    {
        $subscriptions = $this->entityManager->getRepository(UserConnection::class)->findBy([
            'follower' => $data->getFollower()->getId(),
        ]);

        if (!$subscriptions) {
            throw new NotFoundHttpException('No Subscriptions found for the given user');
        }

        $userList = [];

        foreach ($subscriptions as &$subscription) {
            $user = $subscription->getUser()->getId();

            if ($user) {
                $userList[] = $user;
            }
        }
      

        return new JsonResponse($userList);
    }
}