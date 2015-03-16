<?php

namespace BluehornDigital\FreshBooks;

use BluehornDigital\FreshBooks\Utils\Exception;
use BluehornDigital\FreshBooks\Utils\Request;

/**
 * Class ApiCall
 *
 * @category FreshBooks
 * @package  BluehornDigital\FreshBooks
 * @author   Matt Glaman <matt@bluehorndigital.com>
 */
class ApiCall implements ApiCallInterface
{

    /**
     * @var \BluehornDigital\FreshBooks\Api
     */
    protected $api;

    /**
     * @var string
     */
    protected $modelType;

    /**
     * @inheritdoc
     */
    public function __construct(Api $apiClient)
    {
        if (!$this->modelType) {
            throw new Exception('ApiCall class is not to be invoked directly.');
        }
        $this->api = $apiClient;
    }

    /**
     * @inheritdoc
     */
    public function create()
    {

    }

    /**
     * @inheritdoc
     */
    public function update()
    {

    }

    /**
     * @inheritdoc
     */
    public function get($apiId)
    {
        return $this->newRequest('get')
            ->setBody(new \DOMElement('client_id', $apiId))
            ->send();
    }

    /**
     * @inheritdoc
     */
    public function delete($apiId)
    {

    }

    /**
     * @inheritdoc
     */
    public function query($options = [])
    {
        $request = $this->newRequest('list');

        $options += $this->queryOptions();

        foreach (array_filter($options) as $option => $value) {
            $request->setBody(new \DOMElement($option, $value));
        }

        return $request->send();
    }

    /**
     * Allows extending classes to provide default query options.
     *
     * @return array
     */
    public function queryOptions()
    {
        return array();
    }

    /**
     * Returns a new request object.
     *
     * @param string $method API call method to invoke
     *
     * @return \BluehornDigital\FreshBooks\Utils\Request
     */
    protected function newRequest($method)
    {
        return new Request($this->api, $this->modelType . '.' . $method);
    }
}
