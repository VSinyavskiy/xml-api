<?php

namespace App\EventListener;

use App\Service\Response\Exception\ResponseService;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;

class ApiExceptionListener
{
    /**
     * @var ResponseService
     */
    protected $responseService;

    public function __construct(ResponseService $responseService)
    {
        $this->responseService = $responseService;
    }

    public function onKernelException(ExceptionEvent $event): void
    {
        $event->setResponse($this->responseService->setException($event->getThrowable())->getResponse());
    }
}
