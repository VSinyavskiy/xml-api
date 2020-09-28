<?php

namespace App\Service;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;

interface UserTransactionInterface
{
    public function transaction(EntityManagerInterface $entityManager, User $user, int $amount): void;
}
