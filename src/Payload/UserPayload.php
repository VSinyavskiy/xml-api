<?php

namespace App\Payload;

use Symfony\Component\Validator\Constraints as Assert;

class UserPayload extends AbstractPayload
{
    /**
     * @Assert\Type(type="string")
     * @Assert\NotBlank()
     * @var string
     */
    protected $tid;

    /**
     * @Assert\Type(type="string")
     * @Assert\NotBlank()
     * @var string
     */
    protected $uid;

    /**
     * @Assert\Type(type="string")
     * @Assert\GreaterThan(0)
     * @Assert\NotBlank()
     * @var string
     */
    protected $amount;

    public function __construct(
        string $tid = null,
        string $uid = null,
        string $amount = null
    )
    {
        $this->tid = $tid;
        $this->uid = $uid;
        $this->amount = $amount;
    }

    public function getTransactionId(): string
    {
        return $this->tid;
    }

    public function getUserId(): string
    {
        return $this->uid;
    }

    public function getAmount(): string
    {
        return $this->amount;
    }
}
