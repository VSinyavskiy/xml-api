<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @ORM\Table(name="users", indexes={
 *     @ORM\Index(name="user_idx", columns={"user_id"})
 * })
 * @ORM\EntityListeners({
 *     "App\EventListener\UserListener"
 * })
 *
 * @property int $id
 * @property ArrayCollection|Transaction[] $transactions
 * @property string $userId
 * @property int $balance
 */
class User
{
    public const DEFAULT_BALANCE = 0;

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     * @var int
     */
    protected $id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Transaction", mappedBy="user", cascade={"persist", "remove"})
     * @var ArrayCollection|Transaction[]
     */
    protected $transactions;

    /**
     * @ORM\Column(type="string", name="user_id", nullable=false)
     * @Assert\Type(type="string")
     * @Assert\NotBlank()
     * @var string
     */
    protected $userId;

    /**
     * @ORM\Column(type="integer", name="balance", nullable=false, options={"default"=User::DEFAULT_BALANCE})
     * @Assert\Type(type="integer")
     * @Assert\NotBlank()
     * @var int
     */
    protected $balance = self::DEFAULT_BALANCE;

    public function setUserId(string $userId): void
    {
        $this->userId = $userId;
    }

    public function getBalance(): int
    {
        return $this->balance;
    }

    public function setBalance(int $balance): void
    {
        $this->balance = $balance;
    }
}
