# FreshBooks SDK

A PHP library for interacting with the FreshBooks API!

### Usage

````

// Initiate an API client with your FreshBooks domain prefix and token.
$apiClient = new \BluehornDigital\FreshBooks\Api('domain', 'profileToken');

// Create an API call
$clientCall = new Clients($apiClient);

// Do something!
$response = $clientCall->query(['username' => 'janedoe']);

$client = new \BluehornDigital\FreshBooks\Models\Client((object) $response['clients']['client']);

// Display client name

print $client->getFirstName() . ' ' . $client->get('last_name');

````
