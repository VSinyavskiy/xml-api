<?php

namespace App\Helper;

class TokenHelper
{
    protected const MIN_PASSWORD_LENGTH = 6;
    protected const MAX_PASSWORD_LENGTH = 20;

    public static function generate(): string
    {
        return base64_encode(random_bytes(random_int(static::MIN_PASSWORD_LENGTH, static::MAX_PASSWORD_LENGTH)));
    }
}
