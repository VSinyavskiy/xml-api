<?php

namespace App\Response;

use Symfony\Component\HttpFoundation\Response;

class XmlResponse extends Response
{
    protected const XML_CONTENT_HEADER = '<?xml version="1.0"?>';
    protected const XML_CONTENT_BODY = '<result msg="{content}"></result>';
    protected const XML_HEADERS = [
        'Content-Type' => 'text/xml',
    ];

    public function __construct(?string $content = '', int $status = 200, array $headers = [])
    {
        parent::__construct($this->xmlContent($content), $status, $this->xmlHeaders($headers));
    }

    public function setContent(?string $content)
    {
        return parent::setContent($this->xmlContent($content));
    }

    protected function xmlContent(?string $content): string
    {
        return str_replace('{content}', ($content ?? ''), static::XML_CONTENT_HEADER . static::XML_CONTENT_BODY);
    }

    protected function xmlHeaders(array $headers): array
    {
        return array_merge($headers, static::XML_HEADERS);
    }
}
