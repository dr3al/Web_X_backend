<?php

namespace App\Controller\User;

use ApiPlatform\Validator\ValidatorInterface;
use App\Entity\User;
use App\Services\User\UserService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

class RegistrationController
{
    public function __construct (
      private EntityManagerInterface $entityManager,
      private ValidatorInterface $validator,
      private UserService $userService
    )
    {}


    public function __invoke (mixed $data): JsonResponse
    {
        $this->validator->validate($data);
        $hashedPassword = $this->userService->hashPassword($data, $data->getPassword());
        $data->setPassword($hashedPassword);

        $this->entityManager->persist($data);
        $this->entityManager->flush();

        return new JsonResponse(["message" => "Пользователь создан."], 200);
    }
}