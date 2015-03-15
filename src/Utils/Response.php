<?php

namespace BluehornDigital\FreshBooks\Utils;

class Response
{
    protected $response;

    protected $error;
    protected $status;
    protected $body;

    public static function xmlToArray($string)
    {
        // String to XML Object, to JSON, and then to PHP array.
        return json_decode(json_encode(simplexml_load_string($string)), true);
    }

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

    public function get()
    {
        return $this->body;
    }

    public function status()
    {
        return $this->status;
    }

    public function error()
    {
        return $this->error;
    }


}
