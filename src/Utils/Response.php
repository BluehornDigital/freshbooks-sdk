<?php

namespace BluehornDigital\FreshBooks\Utils;

/**
 * Class Response
 */
class Response
{
    /**
     * XML response
     * @var string
     */
    protected $response;

    /**
     * Errors
     * @var mixed
     */
    protected $error;

    /**
     * Status
     * @var mixed
     */
    protected $status;

    /**
     * Response body
     * @var mixed
     */
    protected $body;

    /**
     * Converts XML to a PHP array
     *
     * @param string $string XML string
     *
     * @return array
     */
    public static function xmlToArray($string)
    {
        // String to XML Object, to JSON, and then to PHP array.
        return json_decode(json_encode(simplexml_load_string($string)), true);
    }

    /**
     * Initiates an API response handler.
     *
     * @param string $response XML API response
     *
     * @throws \BluehornDigital\FreshBooks\Utils\Exception
     */
    public function __construct($response)
    {

        if (substr($response, 0, 4) == "%PDF") {
            // Binary returned.
            $this->response = $response;
            $this->body = $response;

        } else {
            $this->response = self::xmlToArray($response);
            $this->body = $this->response;

            if (isset($this->response['error'])) {
                $this->error = $this->response['error'];
                throw new Exception('Error in response: ' . $this->error);
            }
        }

        return $this->get();
    }

    /**
     * Returns response body
     * @return array|mixed|string
     */
    public function get()
    {
        return $this->body;
    }

    /**
     * Returns response status
     * @return mixed
     */
    public function status()
    {
        return $this->status;
    }

    /**
     * Returns response error.
     * @return mixed
     */
    public function error()
    {
        return $this->error;
    }


}
