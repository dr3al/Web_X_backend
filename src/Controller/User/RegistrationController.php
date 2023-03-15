<?php

namespace App\Controller\User;

use ApiPlatform\Validator\ValidatorInterface;
use App\Entity\User;
use App\Services\User\UserService;
use Doctrine\ORM\EntityManagerInterface;

class RegistrationController
{
    public function __construct (
      private EntityManagerInterface $entityManager,
      private ValidatorInterface $validator,
      private UserService $userService
    )
    {}

    public function __invoke (User $user): void
    {
        $this->validator->validate($user);
        $hashedPassword = $this->userService->hashPassword($user, $user->getPassword());
        $user->setPassword($hashedPassword);

        $this->entityManager->persist($user);
        $this->entityManager->flush();
    }
}