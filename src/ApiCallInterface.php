<?php

namespace BluehornDigital\FreshBooks;

interface ApiCallInterface {

    /**
     * @param \BluehornDigital\FreshBooks\Api $apiClient
     */
    public function __construct(Api $apiClient);

    /**
     * @return \BluehornDigital\FreshBooks\Utils\Response
     */
    public function create();

    /**
     * @return \BluehornDigital\FreshBooks\Utils\Response
     */
    public function update();

    /**
     * @param $apiId
     * @return \BluehornDigital\FreshBooks\Utils\Response
     */
    public function get($apiId);

    /**
     * @param $apiId
     * @return \BluehornDigital\FreshBooks\Utils\Response
     */
    public function delete($apiId);

    /**
     * @param array $options
     * @return \BluehornDigital\FreshBooks\Utils\Response
     */
    public function query($options = []);
}