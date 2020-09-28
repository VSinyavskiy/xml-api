<?php

namespace App\Repository;

use App\Entity\Transaction;
use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Transaction|null find($id)
 * @method Transaction|null findOneBy(array $criteria)
 * @method Transaction[] findAll()
 * @method Transaction[] findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TransactionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Transaction::class);
    }

    public function findByUserAndToken(User $user, string $transactionId): ?Transaction
    {
        return $this->createQueryBuilder('transaction')
            ->where('transaction.user = :user')
            ->andWhere('transaction.transactionId = :transactionId')
            ->setParameter('user', $user)
            ->setParameter('transactionId', $transactionId)
            ->getQuery()
            ->getOneOrNullResult();
    }
}
