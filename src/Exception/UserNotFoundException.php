<?php

namespace App\Exception;

use Exception;
use Symfony\Component\HttpFoundation\Response;

class UserNotFoundException extends Exception implements ApiExceptionInterface
{
    private const ERROR_MESSAGE = 'user not found';

    public function __construct(string $message = self::ERROR_MESSAGE, int $statusCode = Response::HTTP_NOT_FOUND)
    {
        parent::__construct($message, $statusCode);
    }
}
