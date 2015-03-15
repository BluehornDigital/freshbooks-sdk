<?php

namespace BluehornDigital\FreshBooks\Tests;

use BluehornDigital\FreshBooks\Utils\Request;

class RequestResponseTest extends FreshBooks_BaseTestCase
{
    public function testRequest()
    {
        $clientsList = new Request($this->apiClient, 'client.list');
        $response = $clientsList->send();

        $this->assertNull($response->error());
    }
}