<?php

namespace App\Response\XmlResponse;

use App\Response\XmlResponse;

class SuccessResponse extends XmlResponse
{
    protected const XML_CONTENT_BODY = '<result status="OK"></result>';
}
