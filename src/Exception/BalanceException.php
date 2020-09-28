<?php

namespace App\Exception;

use Exception;
use Symfony\Component\HttpFoundation\Response;

class BalanceException extends Exception implements ApiExceptionInterface
{
    private const ERROR_MESSAGE = 'insufficient funds';

    public function __construct(string $message = self::ERROR_MESSAGE, int $statusCode = Response::HTTP_OK)
    {
        parent::__construct($message, $statusCode);
    }
}
