<?php

namespace App\Controller;

use App\Entity\UserConnection;
use App\Services\User\UserService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class UserConnectionController extends AbstractController
{
    /**
     * @param EntityManagerInterface $entityManager
     * @param ValidatorInterface $validator
     * @param UserService $userService
     */
    public function __construct (
        private EntityManagerInterface $entityManager,
        private ValidatorInterface $validator,
        private UserService $userService
    )
    {}

    /**
     * Метод получает id записи UserConnection, связывающей пользователя и подписчика, по их id.
     *
     * @param $user
     * @param $follower
     * @param EntityManagerInterface $entityManager
     * @return int|null
     */
    public function findUserConnectionId($user,$follower, EntityManagerInterface $entityManager): ?int
    {
        $userConnection = $entityManager->getRepository(UserConnection::class)->findOneBy([
            'user' => $user,
            'follower' => $follower
        ]);

        if (!$userConnection) {
            return null;
        }

        return $userConnection->getId();
    }


//    /**
//     * Метод обрабатывает GET-запрос и возвращает id записи UserConnection, связывающей пользователя и подписчика, по их id.
//     *
//     * @param $user
//     * @param $follower
//     * @param UserConnectionController $userConnectionController
//     * @return JsonResponse
//     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
//     *
//     * @Route("/users/{user}/followers/{follower}/user-connection-id", name="get_user_connection_id", methods={"GET"})
//     */
//    public function getUserConnectionId($user, $follower, UserConnectionController $userConnectionController): JsonResponse
//    {
//        $userConnectionId = $userConnectionController->findUserConnectionId($user, $follower, $this->getDoctrine()->getManager());
//
//        if (!$userConnectionId) {
//            throw $this->createNotFoundException('UserConnection not found');
//        }
//
//        return new JsonResponse(['user_connection_id' => $userConnectionId]);
//    }

}