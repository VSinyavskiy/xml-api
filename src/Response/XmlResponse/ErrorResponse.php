<?php

namespace App\Response\XmlResponse;

use App\Response\XmlResponse;

class ErrorResponse extends XmlResponse
{
    protected const XML_CONTENT_BODY = '<result status="ERROR" msg="{content}"></result>';
}
