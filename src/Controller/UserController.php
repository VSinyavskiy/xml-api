<?php

namespace App\Controller;

use App\Driver\UserDriver;
use App\Payload\UserPayload;
use App\Response\XmlResponse\SuccessResponse;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api/user", name="user_")
 */
class UserController extends AbstractFOSRestController
{
    /**
     * @Rest\Post("/credit", name="credit")
     * @ParamConverter("userPayload", converter="payload", class="App\Payload\UserPayload")
     */
    public function creditAction(UserPayload $userPayload, UserDriver $userDriver): SuccessResponse
    {
        $userDriver->credit($userPayload);

        return new SuccessResponse();
    }

    /**
     * @Rest\Post("/debit", name="debit")
     * @ParamConverter("userPayload", converter="payload", class="App\Payload\UserPayload")
     */
    public function debitAction(UserPayload $userPayload, UserDriver $userDriver): SuccessResponse
    {
        $userDriver->debit($userPayload);

        return new SuccessResponse();
    }
}
