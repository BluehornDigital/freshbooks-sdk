<?php

namespace BluehornDigital\FreshBooks;

use BluehornDigital\FreshBooks\Utils\Request;

class Clients implements ApiCallInterface {

    protected $api;

    public function __construct(Api $apiClient)
    {
        $this->api = $apiClient;
    }

    public function create()
    {

    }
    public function update()
    {

    }
    public function get($apiId)
    {

    }
    public function delete($apiId)
    {

    }

    /**
     * Queries for clients.
     *
     * @param array $options
     * @return \BluehornDigital\FreshBooks\Utils\Response
     */
    public function query($options = [])
    {
        $request = new Request($this->api, 'client.list');

        $options += $this->queryOptions();

        foreach (array_filter($options) as $option => $value) {
            $request->setBody(new \DOMElement($option, $value));
        }

        return $request->send();
    }

    /**
     * @return array
     */
    public function queryOptions() {
        return array(
          'email' => null,
          'username' => null,
          'updated_form' => null,
          'updated_to' => null,
          'page' => null,
          'per_page' => null,
          'folder' => null,
          'notes' => null,
        );
    }
}