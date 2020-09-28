<?php

namespace App\Service\Payload\Builder;

use App\Payload\PayloadInterface;
use App\Service\Payload\Factory\Factory;
use App\Service\Payload\Validator;

class PayloadBuilder implements PayloadBuilderInterface
{
    /**
     * @var PayloadInterface
     */
    protected $payload;

    /**
     * @var Validator
     */
    protected $validator;

    public function __construct(Validator $validator)
    {
        $this->validator = $validator;
    }

    public function handle(string $class, array $data): self
    {
        $payload = Factory::create($class, $data);
        $this->validator->validate($payload);

        $this->payload = $payload;

        return $this;
    }

    public function get(): ?PayloadInterface
    {
        return $this->payload;
    }
}
