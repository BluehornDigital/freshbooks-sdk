<?php

namespace BluehornDigital\Freshbooks;

class Api
{
    protected $apiUrl = 'https://:domain.freshbooks.com/api/2.1/xml-in';
    protected $instanceUrl = '';
    protected $domain = '';
    protected $token = '';

    /**
     * @param $domain
     * @param $token
     */
    public function __construct($domain, $token)
    {
        $this->domain = $domain;
        $this->token = $token;
        $this->instanceUrl = str_replace(':domain', $domain, $this->apiUrl);
    }

    /**
     * @return mixed|string
     */
    public function getApiUrl()
    {
        return $this->instanceUrl;
    }

    /**
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @return string
     */
    public function getDomain()
    {
        return $this->domain;
    }
}
