<?php

namespace App\Service\Payload\Builder;

interface PayloadBuilderInterface
{
    public function handle(string $class, array $data);
}
