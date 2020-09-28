<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    protected const USER_COUNT = 10;
    protected const USER_MIN_BALANCE = 0;
    protected const USER_MAX_BALANCE = 100;

    public function load(ObjectManager $manager)
    {
        for ($count = 0; $count < self::USER_COUNT; $count++) {
            $user = new User();
            $user->setBalance(random_int(self::USER_MIN_BALANCE, self::USER_MAX_BALANCE));

            $manager->persist($user);
        }

        $manager->flush();
    }
}
