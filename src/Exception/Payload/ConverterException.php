<?php

namespace App\Exception\Payload;

use App\Exception\ApiExceptionInterface;
use Exception;
use Symfony\Component\HttpFoundation\Response;

class ConverterException extends Exception implements ApiExceptionInterface
{
    private const ERROR_MESSAGE = 'Attribute for payload conversion is empty';

    public function __construct(string $message = self::ERROR_MESSAGE, int $statusCode = Response::HTTP_BAD_REQUEST)
    {
        parent::__construct($message, $statusCode);
    }
}
