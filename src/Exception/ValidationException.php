<?php

namespace App\Exception;

use Exception;
use Symfony\Component\HttpFoundation\Response;

class ValidationException extends Exception implements ApiExceptionInterface
{
    private const ERROR_MESSAGE = 'Validation error';
    private const ERROR_DELIMITER = '|';
    private const ERROR_FIELDS_DELIMITER = ', ';

    /**
     * @var array
     */
    private $validationErrors;

    public function __construct(
        array $errors = [],
        string $message = self::ERROR_MESSAGE,
        int $statusCode = Response::HTTP_BAD_REQUEST
    )
    {
        $this->validationErrors = $errors;

        parent::__construct($this->getData($message), $statusCode);
    }

    protected function getData(string $message): string
    {
        return self::ERROR_MESSAGE .
            self::ERROR_DELIMITER .
            implode(self::ERROR_FIELDS_DELIMITER, array_keys($this->validationErrors));
    }
}
