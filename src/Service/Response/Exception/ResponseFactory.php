<?php

namespace App\Service\Response\Exception;

use App\Exception\ApiExceptionInterface;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class ResponseFactory
{
    protected const DEFAULT_ERROR_MESSAGE = 'internal server error';
    protected const DEFAULT_ERROR_CODE = 500;

    public static function create(string $responseClass, Throwable $exception = null): Response
    {
        /** @var Response $response */
        $response = new $responseClass();
        if ($exception instanceof ApiExceptionInterface) {
            $response->setContent($exception->getMessage());
            $response->setStatusCode($exception->getCode());
        } else {
            $response->setContent(static::DEFAULT_ERROR_MESSAGE);
            $response->setStatusCode(static::DEFAULT_ERROR_CODE);
        }

        return $response;
    }
}
