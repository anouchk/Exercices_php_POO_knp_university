<?php

class Meteoroid implements \ArrayAccess
{
    private $elements = [];

    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function addElement($name, $mass)
    {
        $this->elements[$name] = $mass;
    }

    public function getName()
    {
        return $this->name;
    }
    
    public function offsetExists($offset)
    {
        return isset($this->elements[$offset]);
    }

    public function offsetGet($offset)
    {
        if ($this->offsetExists($offset)) {
            return $this->elements[$offset];
        }

        return null;
    }

    public function offsetSet($offset, $value)
    {
        $this->elements[$offset] = $value;
    }

    public function offsetUnset($offset)
    {
        unset($this->elements[$offset]);
    }
}