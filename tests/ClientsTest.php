<?php

namespace BluehornDigital\FreshBooks\Tests;

use BluehornDigital\FreshBooks\Clients;
use BluehornDigital\FreshBooks\Utils\Request;

/**
 * Class ClientsTest
 * @package BluehornDigital\FreshBooks\Tests
 */
class ClientsTest extends FreshBooks_BaseTestCase
{
    public function testRequest()
    {
        $clientsCall = new Clients($this->apiClient);
        $response = $clientsCall->query();

        /** @var \BluehornDigital\FreshBooks\Models\Client[] $paged */
        $paged = $clientsCall->query(['page' => 1, 'per_page' => 5]);

        $this->assertNotNull($paged[0]->getFirstName());
    }

    public function testRequestSingle()
    {
        $clientsCall = new Clients($this->apiClient);
        /** @var \BluehornDigital\FreshBooks\Models\Client $client */
        $client = $clientsCall->get('32381');

        $this->assertNotNull($client->getFirstName());
    }
}
