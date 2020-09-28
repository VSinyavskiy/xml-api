<?php

namespace App\Exception\Payload;

use App\Exception\ApiExceptionInterface;
use Exception;
use Symfony\Component\HttpFoundation\Response;

class FactoryException extends Exception implements ApiExceptionInterface
{
    private const ERROR_MESSAGE = 'Payload class not defined';

    public function __construct(string $message = self::ERROR_MESSAGE, int $statusCode = Response::HTTP_BAD_REQUEST)
    {
        parent::__construct($message, $statusCode);
    }
}
