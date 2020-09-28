<?php

namespace App\Payload;

interface PayloadInterface
{
    public function serialize(): array;
}
