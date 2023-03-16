<?php
//
//namespace App\Filter\Goal;
//
//use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\AbstractContextAwareFilter;
//use ApiPlatform\Core\Bridge\Doctrine\Orm\Util\QueryNameGeneratorInterface;
//use ApiPlatform\Core\Exception\InvalidArgumentException;
//use ApiPlatform\Core\Exception\RuntimeException;
//use Doctrine\ORM\EntityManagerInterface;
//use Doctrine\ORM\QueryBuilder;
//use http\Client\Request;
//use http\Client\Response;
//
//class GoalFilter
//{
//    private EntityManagerInterface $entityManager;
//
//    public function __construct(EntityManagerInterface $entityManager)
//    {
//        $this->entityManager = $entityManager;
//    }
//
//    /**
//     * @Route("/api/goals/filter", name="get_filtered_goals", methods={"GET"})
//     */
//    public function __invoke(Request $request): Response
//    {
//        $user = $request->query->get('user');
//        $text = $request->query->get('text');
//
//        $qb = $this->entityManager->createQueryBuilder()
//            ->select('g')
//            ->from(Goal::class, 'g');
//
//        if ($user) {
//            $qb->andWhere('g.user = :user')->setParameter('user', $user);
//        }
//
//        if ($text) {
//            $qb->andWhere('g.text LIKE :text')->setParameter('text', '%'.$text.'%');
//        }
//
//        $goals = $qb->getQuery()->getResult();
//
//        return new JsonResponse($goals);
//    }
//}