<?php

namespace BluehornDigital\FreshBooks\Utils;

use BluehornDigital\Freshbooks\Api;

class Request
{
    protected $apiClient;
    protected $method;

    /** @var  \DOMDocument */
    protected $xmlDocument;
    /** @var  \DOMElement */
    protected $xmlMethodElement;


    public function __construct(Api $apiClient, $method)
    {
        $this->apiClient = $apiClient;
        $this->method = $method;
        $this->xml = new \DOMDocument("1.0", "utf-8");
        $this->setMethod();
    }

    protected function setMethod() {
        $methodElement = $this->xml->createElement('request');
        $methodElement->setAttribute('method', $this->method);
        $this->xmlMethodElement = $methodElement;
    }

    public function setBody(\DOMElement $body) {
        $this->xmlMethodElement->appendChild($body);
    }

    public function getXML()
    {
        $this->xml->appendChild($this->xmlMethodElement);
        return $this->xml->saveXML();
    }

    public function send()
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->apiClient->getApiUrl());
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 40);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $this->getXML());
        curl_setopt($ch, CURLOPT_USERPWD, $this->apiClient->getToken() . ':X');
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            throw new Exception('An error occurred: ' . curl_error($ch));
        }

        curl_close($ch);

        return new Response($response);
    }


}
