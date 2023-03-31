<?php

namespace App\Repository;

use App\Entity\UserConnection;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<UserConnection>
 *
 * @method UserConnection|null find($id, $lockMode = null, $lockVersion = null)
 * @method UserConnection|null findOneBy(array $criteria, array $orderBy = null)
 * @method UserConnection[]    findAll()
 * @method UserConnection[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserConnectionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UserConnection::class);
    }

    public function save(UserConnection $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(UserConnection $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

}
