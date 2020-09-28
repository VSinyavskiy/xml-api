<?php

namespace App\Driver;

use App\Payload\UserPayload;
use App\Service\Transaction\TransactionCheckerService;
use App\Service\User\CreditService;
use App\Service\User\DebitService;
use App\Service\UserGetterService;

class UserDriver
{
    /**
     * @var CreditService
     */
    protected $creditService;

    /**
     * @var DebitService
     */
    protected $debitService;

    /**
     * @var TransactionCheckerService
     */
    protected $transactionCheckerService;

    /**
     * @var UserGetterService
     */
    protected $userGetterService;

    public function __construct(
        CreditService $creditService,
        DebitService $debitService,
        TransactionCheckerService $transactionCheckerService,
        UserGetterService $userGetterService
    )
    {
        $this->creditService = $creditService;
        $this->debitService = $debitService;
        $this->transactionCheckerService = $transactionCheckerService;
        $this->userGetterService = $userGetterService;
    }

    public function credit(UserPayload $userPayload): void
    {
        $user = $this->userGetterService->fromDb($userPayload->getUserId());
        if ($this->transactionCheckerService->isAllowed($user, $userPayload->getTransactionId())) {
            $this->creditService->handle($user, (int) $userPayload->getAmount());
        }
    }

    public function debit(UserPayload $userPayload): void
    {
        $user = $this->userGetterService->fromDb($userPayload->getUserId());
        if ($this->transactionCheckerService->isAllowed($user, $userPayload->getTransactionId())) {
            $this->debitService->handle($user, (int) $userPayload->getAmount());
        }
    }
}
