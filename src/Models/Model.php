<?php

namespace BluehornDigital\FreshBooks\Models;

/**
 * Class Model
 */
class Model implements ModelInterface
{
    /**
     * @var \stdClass
     */
    protected $object;

    /**
     * @param \stdClass $object
     */
    public function __construct(\stdClass $object = null)
    {
        $this->object = ($object === null) ? new \stdClass() : $object;
    }

    /**
     * @param $key
     * @param $value
     *
     * @return $this
     */
    public function set($key, $value)
    {
        $this->object->{$key} = $value;

        return $this;
    }

    /**
     * @param $key
     *
     * @return null
     */
    public function get($key)
    {
        if (isset($this->object->{$key})) {
            return $this->object->{$key};
        }

        return null;
    }

    /**
     * @return \stdClass
     */
    public function raw()
    {
        return $this->object;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return (array) $this->raw();
    }

    /**
     * @return string
     */
    public function toJSON()
    {
        return json_encode($this->raw());
    }

    /**
     * @param \DOMNode $attachTo
     */
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
