<?php

namespace App\Controller\User;

use App\Entity\User;
use App\Services\User\GeneratePasswordService;
use App\Services\User\SendMailService;
use App\Services\User\UserService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ResetPasswordController extends AbstractController
{
    public function __construct (
        private readonly EntityManagerInterface  $em,
        private readonly UserService             $userService,
        private readonly GeneratePasswordService $generatePasswordService,
        private readonly SendMailService $mailService
    )
    {}

    public function __invoke(mixed $data)
    {
        $email = $data->getEmail();
        $repository = $this->em->getRepository(User::class);
        if(!($user = $repository->findOneBy(['email'=>$email]))) {
            throw new NotFoundHttpException();
        }
        else {
            $password = $this->generatePasswordService->gen_password(10); // получение сгенерированного пароля
            $hashedPassword = $this->userService->hashPassword($user, $password); // хэшируем пароль
            $user->setPassword($hashedPassword);

            $this->em->persist($user);
            $this->em->flush(); // отправляем хэшированный пароль в базу

            $this->mailService->send($user->getEmail(),$password);

            return new JsonResponse('Пароль успешно изменен');
        }
    }
}