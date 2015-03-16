<?php

namespace BluehornDigital\Freshbooks\Models;

/**
 * Interface ModelInterface
 */
interface ModelInterface
{
    /**
     * @param $key
     * @param $value
     *
     * @return mixed
     */
    public function set($key, $value);

    /**
     * @param $key
     *
     * @return mixed
     */
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
