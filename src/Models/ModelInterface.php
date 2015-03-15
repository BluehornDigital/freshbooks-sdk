<?php

namespace BluehornDigital\Freshbooks\Models;

interface ModelInterface
{
    public function set($key, $value);
    public function get($key);

    /**
     * Return the model as an object
     * @return \stdClass
     */
    public function raw();

    /**
     * Return the model as an array
     * @return mixed
     */
    public function toArray();

    /**
     * Return the model as JSON
     * @return mixed
     */
    public function toJSON();

    /**
     * @param \DOMNode $attachTo The DOMElement to attach to.
     */
    public function toXML(\DOMNode $attachTo);
}
