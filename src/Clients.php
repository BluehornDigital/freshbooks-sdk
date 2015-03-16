<?php

namespace BluehornDigital\FreshBooks;

use BluehornDigital\FreshBooks\Models\Client;

/**
 * Class Clients
 */
class Clients extends ApiCall
{

    /**
     * @var string
     */
    protected $modelType = 'client';

    /**
     * @return array
     */
    public function queryOptions()
    {
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

    /**
     * @inheritdoc
     */
    protected function newModel($mixed) {
        return new Client((object) $mixed);
    }
}
