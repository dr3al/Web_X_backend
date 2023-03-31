<?php

namespace App\EventListener;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationCredentialsNotFoundException;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use League\Bundle\OAuth2ServerBundle\Event\UserResolveEvent;

final class UserResolveListener
{
    public function __construct(
        private EntityManagerInterface $entityManager,
        private UserPasswordHasherInterface $userPasswordHasher
    )
    {}

    public function onUserResolve(UserResolveEvent $event): void
    {

        $user = $this->entityManager->getRepository(User::class)->findOneBy(['username' => $event->getUsername()]);

        if(!$user){
            throw new AuthenticationCredentialsNotFoundException('Invalid username', Response::HTTP_NOT_FOUND);
        }

        if (!$this->userPasswordHasher->isPasswordValid($user, $event->getPassword())) {
            throw new AuthenticationCredentialsNotFoundException('Invalid password', Response::HTTP_NOT_FOUND);
        }

        $event->setUser($user);
    }
}