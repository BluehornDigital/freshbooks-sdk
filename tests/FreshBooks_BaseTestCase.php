<?php

namespace BluehornDigital\FreshBooks\Tests;

use BluehornDigital\FreshBooks\Api;

class FreshBooks_BaseTestCase extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Api
     */
    protected $apiClient;

    /**
     * @inheritdoc
     */
    public function setUp()
    {
        $this->apiClient = new Api(FRESHBOOKS_PHPUNIT_DOMAIN, FRESHBOOKS_PHPUNIT_TOKEN);
    }
}