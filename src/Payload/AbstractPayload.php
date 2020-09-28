<?php

namespace App\Payload;

abstract class AbstractPayload implements PayloadInterface
{
    public function serialize(): array
    {
        $data = [];
        foreach ($this as $attribute => $value) {
            $data[$attribute] = $value;
        }

        return $data;
    }
}
