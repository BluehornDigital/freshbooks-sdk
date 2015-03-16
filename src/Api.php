<?php

namespace BluehornDigital\FreshBooks;

/**
 * Class Api
 */
class Api
{
    protected $apiUrl = 'https://:domain.freshbooks.com/api/2.1/xml-in';
    protected $instanceUrl = '';
    protected $domain = '';
    protected $token = '';

    /**
     * Initiates API Client
     * @param string $domain Domain prefix
     * @param string $token  User token
     */
    public function __construct($domain, $token)
    {
        $this->domain = $domain;
        $this->token = $token;
        $this->instanceUrl = str_replace(':domain', $domain, $this->apiUrl);
    }

    /**
     * Returns the API url for domain.
     * @return mixed|string
     */
    public function getApiUrl()
    {
        return $this->instanceUrl;
    }

    /**
     * Returns token provided
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Returns the domain for the API
     * @return string
     */
    public function getDomain()
    {
        return $this->domain;
    }
}
