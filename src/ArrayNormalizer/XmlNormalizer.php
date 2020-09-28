<?php

namespace App\ArrayNormalizer;

use FOS\RestBundle\Normalizer\ArrayNormalizerInterface;

class XmlNormalizer implements ArrayNormalizerInterface
{
    protected const SYMBOLS_TO_NORMALIZATION = [
        '@' => '',
    ];

    public function normalize(array $data): array
    {
        return $this->normalizeArray($data);
    }

    protected function normalizeArray(array $data): array
    {
        $normalized = [];
        foreach ($data as $attribute => $value) {
            $normalized[$this->getNormalizedAttribute($attribute)] = $value;
        }

        return $normalized;
    }

    protected function getNormalizedAttribute(string $attribute): string
    {
        return str_replace(
            array_keys(self::SYMBOLS_TO_NORMALIZATION),
            array_values(self::SYMBOLS_TO_NORMALIZATION),
            $attribute
        );
    }
}
