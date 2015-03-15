<?php

namespace BluehornDigital\FreshBooks\Models;

class Model implements ModelInterface
{
    protected $object;

    public function __construct(\stdClass $object = null)
    {
        $this->object = ($object === null) ? new \stdClass() : $object;
    }

    public function set($key, $value)
    {
        $this->object->{$key} = $value;
        return $this;
    }

    public function get($key)
    {
        if (isset($this->object->{$key})) {
            return $this->object->{$key};
        }
        return null;
    }

    public function raw()
    {
        return $this->object;
    }

    public function toArray()
    {
        return (array) $this->raw();
    }

    public function toJSON()
    {
        return json_encode($this->raw());
    }

    public function toXML(\DOMNode $attachTo)
    {
        foreach ($this->object as $key => $value) {
            if (is_array($value)) {
                $element = $attachTo->appendChild(new \DOMElement($key));
                foreach ($value as $subKey => $subValue) {
                    $this->toXML($element);
                }
                $attachTo->appendChild($element);
            } else {
                $attachTo->appendChild(new \DOMElement($key, $value));
            }
        }
    }
}