<?php

namespace App\EventListener;

use App\Entity\User;
use App\Helper\TokenHelper\UserIdTokenHelper;

class UserListener
{
    public function prePersist(User $user): void
    {
        $user->setUserId(UserIdTokenHelper::generate());
    }
}
