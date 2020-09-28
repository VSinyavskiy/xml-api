<?php

namespace App\Service\Payload\Factory;

use App\Payload\PayloadInterface;
use App\Exception\Payload\FactoryException;
use App\Payload\UserPayload;

class Factory
{
    public static function create(string $class, array $data): PayloadInterface
    {
        $data = new DataHelper($data);

        switch ($class) {
            case UserPayload::class:
                return new UserPayload($data->get('tid'), $data->get('uid'), $data->get('amount'));
            default:
                throw new FactoryException();
        }
    }
}
