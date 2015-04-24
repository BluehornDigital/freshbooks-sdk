<?php

namespace BluehornDigital\FreshBooks;

use BluehornDigital\FreshBooks\Models\Model;
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
     * @var string
     */
    protected $modelTypePlural;

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
        $response = $this->newRequest('get')
            ->setBody(new \DOMElement($this->modelType . '_id', $apiId))
            ->send()
            ->get();

        return $this->newModel($response[$this->modelType]);
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

        $response = $request->send()->get();

        $return = array();

        // API responds with results wrapped in model type's plural format.
        $responseKey = $this->modelTypePlural;

        foreach ($response[$responseKey][$this->modelType] as $apiItem) {
            $return[] = $this->newModel($apiItem);
        }

        return $return;
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

    /**
     * @param $mixed
     *
     * @return \BluehornDigital\FreshBooks\Models\ModelInterface
     */
    protected function newModel($mixed) {
        return new Model((object) $mixed);
    }
}
