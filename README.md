# FreshBooks SDK

A PHP library for interacting with the FreshBooks API!

### Usage

````php

// Initiate an API client with your FreshBooks domain prefix and token.
$apiClient = new \BluehornDigital\FreshBooks\Api('domain', 'profileToken');

// Create an API call
$clientCall = new Clients($apiClient);

// Do something!
$response = $clientCall->query(['username' => 'janedoe']);

$client = $response[0];

// Display client name

print $client->getFirstName() . ' ' . $client->get('last_name');

````
