<?php

namespace SKHR\PteroAPI\Resources;

use SKHR\PteroAPI\PteroAPI;
use ArrayAccess;
use JsonSerializable;
use Serializable;

class Resource implements ArrayAccess, JsonSerializable, Serializable {

    /**
     * PteroAPI instance
     * 
     * @var PteroAPI
     */
    protected $pteroAPI;

    /**
     * Resource attributes.
     *
     * @var array
     */
    protected $attributes;

    /**
     * Origin attributes.
     *
     * @var array
     */
    protected $origin;

    /**
     * Create a new Ressource instance
     * 
     * @param array $attributes
     * @param PteroAPI $pteroAPI
     */
    public function __construct($attributes, $pteroAPI) {
        $attributes = isset($attributes['attributes']) ? $attributes['attributes'] : $attributes;

        $this->origin = $this->attributes = $attributes;

        $this->pteroAPI = $pteroAPI;
    }

    public function getChangedData() {
        $data = array_diff($this->attributes, $this->origin);

        $this->origin = $this->attributes;

        return $data;
    }

    public function __set($key, $value) {
        $this->attributes[$key] = $value;
    }

    public function __get($key) {
        return $this->attributes[$key];
    }

    public function __isset($key) {
        return isset($this->attributes[$key]);
    }

    public function __unset($key) {
        unset($this->attributes[$key]);
    }
    
    public function toArray() {
        return $this->all();
    }

    public function all() {
        return $this->attributes;
    }

    public function get($offset) {
        return $this->attributes[$offset];
    }

    public function set($offset, $value) {
        $this->attributes[$offset] = $value;
    }

    public function has($offset) {
        return isset($this->attributes[$offset]);
    }

    public function forget($offset) {
        unset($this->attributes[$offset]);
    }

    public function offsetGet($offset) : mixed {
        return $this->offsetExists($offset) ? $this->get($offset) : null;
    }

    public function offsetSet($offset, $value) : void {
        $this->set($offset, $value);
    }

    public function offsetUnset($offset) : void {
        if ($this->offsetExists($offset)) {
            $this->forget($offset);
        }
    }

    public function offsetExists($offset) : bool {
        return $this->has($offset);
    }

    public function jsonSerialize() : array {
        return $this->attributes;
    }

    public function __serialize() {
        return serialize($this->attributes);
    }

    public function __unserialize($serialized) {
        return $this->attributes = unserialize($serialized);
    }

    public function serialize() {
        return serialize($this->attributes);
    }

    public function unserialize($serialized) {
        return $this->attributes = unserialize($serialized);
    }
}

?>