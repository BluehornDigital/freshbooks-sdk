<?php

namespace BluehornDigital\FreshBooks\Models;

class Client extends Model
{
    public function getClientId()
    {
        return $this->get('client_id');
    }

    public function setFirstName($value)
    {
        return $this->set('first_name', $value);
    }

    public function getFirstName()
    {
        return $this->get('first_name');
    }
}