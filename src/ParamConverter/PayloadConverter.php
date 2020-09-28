<?php

namespace App\ParamConverter;

use App\Exception\Payload\ConverterException;
use App\Service\Payload\Builder\PayloadBuilder;
use App\Service\Payload\Validator;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\ParamConverterInterface;
use Symfony\Component\HttpFoundation\Request;

class PayloadConverter implements ParamConverterInterface
{
    protected const CONVERTER_NAME = 'payload';

    protected const ATTRIBUTE_OPTION = 'from';

    /**
     * @var Validator
     */
    protected $validator;

    public function __construct(Validator $validator)
    {
        $this->validator = $validator;
    }

    public function apply(Request $request, ParamConverter $configuration): bool
    {
        $class = $configuration->getClass();
        $options = $configuration->getOptions();
        $data = $this->getData($request->request->all(), $options);

        $builder = (new PayloadBuilder($this->validator));
        $request->attributes->set($configuration->getName(), $builder->handle($class, $data)->get());

        return true;
    }

    public function supports(ParamConverter $configuration): bool
    {
        return ((null !== $configuration->getClass()) && (self::CONVERTER_NAME === $configuration->getConverter()));
    }

    protected function getData(array $data, array $options): array
    {
        if (empty($options[self::ATTRIBUTE_OPTION])) {
            return $data;
        }

        if (!isset($data[$options[self::ATTRIBUTE_OPTION]])) {
            throw new ConverterException();
        }

        return $data[$options[self::ATTRIBUTE_OPTION]];
    }
}
