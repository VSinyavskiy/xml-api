<?php

namespace App\Service\Response\Exception;

use App\Response\XmlResponse\ErrorResponse;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class ResponseService
{
    /**
     * @var Throwable|null
     */
    protected $exception;

    /**
     * @var string
     */
    protected $responseClass;

    public function __construct()
    {
        $this->responseClass = ErrorResponse::class;
    }

    public function setException(Throwable $exception): self
    {
        $this->exception = $exception;

        return $this;
    }

    public function getResponse(): Response
    {
        return ResponseFactory::create($this->responseClass, $this->exception);
    }
}
