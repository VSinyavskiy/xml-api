<?php

namespace App\Service\User;

use App\Entity\Transaction;
use App\Entity\User;
use App\Service\Transaction\TransactionCreatorService;
use App\Service\UserTransactionInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class CreditService implements UserTransactionInterface
{
    /**
     * @var EntityManagerInterface
     */
    protected $entityManager;

    /**
     * @var ValidatorInterface
     */
    protected $validator;

    public function __construct(EntityManagerInterface $entityManager, ValidatorInterface $validator)
    {
        $this->entityManager = $entityManager;
        $this->validator = $validator;
    }

    public function handle(User $user, int $amount): void
    {
        $this->entityManager->transactional(function (EntityManagerInterface $entityManager) use ($user, $amount) {
            $this->transaction($entityManager, $user, $amount);
        });
    }

    public function transaction(EntityManagerInterface $entityManager, User $user, int $amount): void
    {
        $balance = $user->getBalance() + $amount;
        $user->setBalance($balance);

        $transaction = new TransactionCreatorService($entityManager, $this->validator);
        $transaction->create($user, Transaction::CREDIT_TYPE, $amount);

        $entityManager->flush();
    }
}
