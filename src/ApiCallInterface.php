<?php

namespace BluehornDigital\FreshBooks;

/**
 * Interface ApiCallInterface
 */
interface ApiCallInterface {

    /**
     * API Calls must consume an API Client
     *
     * @param \BluehornDigital\FreshBooks\Api $apiClient API Client
     */
    public function __construct(Api $apiClient);

    /**
     * Creates a object on the API
     *
     * @return \BluehornDigital\FreshBooks\Utils\Response
     */
    public function create();

    /**
     * Updates an object on the API
     *
     * @return \BluehornDigital\FreshBooks\Models\ModelInterface
     */
    public function update();

    /**
     * Returns a single object from API
     *
     * @param string $apiId API ID
     *
     * @return \BluehornDigital\FreshBooks\Utils\Response
     */
    public function get($apiId);

    /**
     * Deletes an object from API
     *
     * @param string $apiId API ID
     *
     * @return \BluehornDigital\FreshBooks\Utils\Response
     */
    public function delete($apiId);

    /**
     * Returns a list of objects
     *
     * @param array $options Array of options
     *
     * @return \BluehornDigital\FreshBooks\Models\ModelInterface[]
     */
    public function query($options = []);
}
