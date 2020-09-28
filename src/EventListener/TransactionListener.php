<?php

namespace App\EventListener;

use App\Entity\Transaction;
use App\Helper\TokenHelper\TransactionIdTokenHelper;
use DateTime;

class TransactionListener
{
    public function prePersist(Transaction $transaction): void
    {
        $transaction->setTransactionId(TransactionIdTokenHelper::generate());
        $transaction->setCreatedAt(new DateTime());
    }
}
