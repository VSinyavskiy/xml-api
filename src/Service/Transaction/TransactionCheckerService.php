<?php

namespace App\Service\Transaction;

use App\Entity\User;
use App\Repository\TransactionRepository;

class TransactionCheckerService
{
    /**
     * @var TransactionRepository
     */
    protected $transactionRepository;

    public function __construct(TransactionRepository $transactionRepository)
    {
        $this->transactionRepository = $transactionRepository;
    }

    public function isAllowed(User $user, string $transactionId): bool
    {
        $transaction = $this->transactionRepository->findByUserAndToken($user, $transactionId);
        if (is_null($transaction)) {
            return true;
        }

        return false;
    }
}
