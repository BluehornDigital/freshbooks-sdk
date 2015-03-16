<?php

namespace BluehornDigital\FreshBooks\Utils;

use BluehornDigital\FreshBooks\Api;

/**
 * Class Request
 */
class Request
{
    /**
     * API client
     *
     * @var \BluehornDigital\Freshbooks\Api
     */
    protected $apiClient;

    /**
     * The API call method
     * @var string
     */
    protected $method;

    /**
     * DOMDocument representation of XML request.
     *
     * @var \DOMDocument
     */
    protected $xmlDocument;

    /**
     * Request element in XML request.
     *
     * @var \DOMElement
     */
    protected $xmlMethodElement;

    /**
     * Initiates request XML
     *
     * @param \BluehornDigital\FreshBooks\Api $apiClient API Client
     * @param string                          $method    API call method
     */
    public function __construct(Api $apiClient, $method)
    {
        $this->apiClient = $apiClient;
        $this->method = $method;
        $this->xml = new \DOMDocument("1.0", "utf-8");
        $this->setMethod();
    }

    /**
     * Sets the API call method XML element.
     *
     * @return self
     */
    protected function setMethod()
    {
        $methodElement = $this->xml->createElement('request');
        $methodElement->setAttribute('method', $this->method);
        $this->xmlMethodElement = $methodElement;
        return $this;
    }

    /**
     * Adds an element to the request body
     *
     * @param \DOMElement $body Element to append.
     *
     * @return $this
     */
    public function setBody(\DOMElement $body)
    {
        $this->xmlMethodElement->appendChild($body);
        return $this;
    }

    /**
     * Returns request XML
     *
     * @return string
     */
    public function getXML()
    {
        $this->xml->appendChild($this->xmlMethodElement);
        return $this->xml->saveXML();
    }

    /**
     * Sends request to FreshBooks API
     *
     * @return \BluehornDigital\FreshBooks\Utils\Response
     * @throws \BluehornDigital\FreshBooks\Utils\Exception
     */
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
