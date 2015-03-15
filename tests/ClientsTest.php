<?php

namespace BluehornDigital\FreshBooks\Tests;

use BluehornDigital\FreshBooks\Clients;
use BluehornDigital\FreshBooks\Utils\Request;

class ClientsTest extends FreshBooks_BaseTestCase
{
    public function testRequest()
    {
        $clientsCall = new Clients($this->apiClient);
        $response = $clientsCall->query();
        $paged = $clientsCall->query(['page' => 1, 'per_page' => 5]);
    }
}