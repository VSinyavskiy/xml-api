<?php

namespace App\Service\Payload;

use App\Exception\ValidationException;
use App\Payload\PayloadInterface;
use Symfony\Component\Validator\ConstraintViolationListInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class Validator
{
    /**
     * @var ValidatorInterface
     */
    protected $validator;

    public function __construct(ValidatorInterface $validator)
    {
        $this->validator = $validator;
    }

    public function validate(PayloadInterface $payload): void
    {
        $validation = $this->validator->validate($payload);
        if ($validation->count()) {
            throw new ValidationException($this->getErrors($validation));
        }
    }

    protected function getErrors(ConstraintViolationListInterface $errorList): array
    {
        $errors = [];
        foreach ($errorList as $error) {
            $errors[$error->getPropertyPath()] = $error->getMessage();
        }

        return $errors;
    }
}
