<?php

namespace App\Helper\TokenHelper;

use App\Helper\TokenHelper;

class UserIdTokenHelper extends TokenHelper
{
    protected const MIN_PASSWORD_LENGTH = 1;
    protected const MAX_PASSWORD_LENGTH = 32;
}
