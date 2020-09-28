<?php

namespace App\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TransactionRepository")
 * @ORM\Table(name="transactions", indexes={
 *     @ORM\Index(name="transaction_idx", columns={"user_id", "transaction_id"})
 * })
 * @ORM\EntityListeners({
 *     "App\EventListener\TransactionListener"
 * })
 *
 * @property int $id
 * @property User $user
 * @property string $transactionId
 * @property int $amount
 * @property int $type
 * @property DateTime $createdAt
 */
class Transaction
{
    public const CREDIT_TYPE = 1;
    public const DEBIT_TYPE = 2;
    public const AVAILABLE_TYPES = [
        self::CREDIT_TYPE,
        self::DEBIT_TYPE,
    ];

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     * @var int
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="transactions")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", onDelete="CASCADE", nullable=false)
     * @var User
     */
    protected $user;

    /**
     * @ORM\Column(type="integer", name="type", nullable=false)
     * @Assert\Type(type="integer")
     * @Assert\Choice(choices=Transaction::AVAILABLE_TYPES, message="Invalid type.")
     * @Assert\NotBlank()
     * @var int
     */
    protected $type;

    /**
     * @ORM\Column(type="integer", name="amount", nullable=false)
     * @Assert\Type(type="integer")
     * @Assert\GreaterThan(0)
     * @Assert\NotBlank()
     * @var int
     */
    protected $amount;

    /**
     * @ORM\Column(type="string", name="transaction_id", nullable=false)
     * @Assert\Type(type="string")
     * @Assert\NotBlank()
     * @var string
     */
    protected $transactionId;

    /**
     * @ORM\Column(type="datetime", name="created_at", nullable=false)
     * @Assert\DateTime()
     * @var DateTime
     */
    protected $createdAt;

    public function setUser(User $user): void
    {
        $this->user = $user;
    }

    public function setType(int $type): void
    {
        $this->type = $type;
    }

    public function setAmount(int $amount): void
    {
        $this->amount = $amount;
    }

    public function setTransactionId(string $transactionId): void
    {
        $this->transactionId = $transactionId;
    }

    public function setCreatedAt(DateTime $createdAt): void
    {
        $this->createdAt = $createdAt;
    }
}
