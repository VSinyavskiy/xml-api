<?php

namespace App\Service;

use App\Entity\User;
use App\Exception\UserNotFoundException;
use App\Repository\UserRepository;

class UserGetterService
{
    /**
     * @var UserRepository
     */
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function fromDb(string $userId): User
    {
        $user = $this->userRepository->findByUserId($userId);
        if (is_null($user)) {
            throw new UserNotFoundException();
        }

        return $user;
    }
}
