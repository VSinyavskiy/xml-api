<?php

namespace App\Service\Transaction;

use App\Entity\Transaction;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class TransactionCreatorService
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

    public function create(User $user, int $type, int $amount): void
    {
        $transaction = new Transaction();
        $transaction->setUser($user);
        $transaction->setType($type);
        $transaction->setAmount($amount);

        $this->validator->validate($transaction);
        $this->entityManager->persist($transaction);
    }
}
