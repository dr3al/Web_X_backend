<?php

namespace App\Services\User;

use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;

class UserService
{
    public function __construct (
    private UserPasswordHasherInterface $passwordHasher
    )
    {}

    public function hashPassword (PasswordAuthenticatedUserInterface $user, string $password): string
    {
        return $this->passwordHasher->hashPassword($user, $password);
    }
}