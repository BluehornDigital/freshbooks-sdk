<?php

namespace BluehornDigital\FreshBooks\Models;

/**
 * Class Client
 */
class Client extends Model
{
    /**
     * @return null
     */
    public function getClientId()
    {
        return $this->get('client_id');
    }

    /**
     * @param $value
     *
     * @return $this
     */
    public function setFirstName($value)
    {
        return $this->set('first_name', $value);
    }

    /**
     * @return null
     */
    public function getFirstName()
    {
        return $this->get('first_name');
    }
}
