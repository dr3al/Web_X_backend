<?php

namespace App\Controller;

use ApiPlatform\Symfony\Bundle\Test\Response;
use App\Entity\LikeConnection;
use App\Entity\Posts;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @property $em
 */
class PostsController extends AbstractController
{
    #[Route('LikeConnections', name: 'likes')]
    public function index(): Response
    {
        $repository = $this->em->getRepository(LikeConnection::class);
        $likes = $repository->count(['id' => 5]);
        return $this->$likes();
    }
}