<?php

namespace BluehornDigital\FreshBooks\Tests;

/**
 * @coversDefaultClass \BluehornDigital\FreshBooks\FreshBooks
 */
class FreshBooksTest extends FreshBooks_BaseTestCase {
    /**
     * @covers ::__construct
     */
    public function testConstructor()
    {
        $this->assertEquals('https://' . FRESHBOOKS_PHPUNIT_DOMAIN . '.freshbooks.com/api/2.1/xml-in', $this->apiClient->getApiUrl());
        $this->assertEquals(FRESHBOOKS_PHPUNIT_DOMAIN, $this->apiClient->getDomain());
        $this->assertEquals(FRESHBOOKS_PHPUNIT_TOKEN, $this->apiClient->getToken());
    }


}