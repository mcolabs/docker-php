<?php

namespace Docker\Exception;

use Docker\Exception;

use Exception as BaseException;
use GuzzleHttp\Message\Response;

/**
 * Docker\Exception\UnexpectedStatusCodeException
 */
class UnexpectedStatusCodeException extends BaseException
{
    /**
     * @param integer $statusCode
     */
    public function __construct($statusCode, $message = null)
    {
        $message = $message ?: 'Status Code: '.$statusCode;
        parent::__construct($message, (integer) $statusCode);
    }

    /**
     * @param Docker\Http\Response $response
     * 
     * @return Docker\Exception\UnexpectedStatusCodeException
     */
    public static function fromResponse(Response $response)
    {
        return new self($response->getStatusCode(), trim((string) $response->getBody()));
    }
}