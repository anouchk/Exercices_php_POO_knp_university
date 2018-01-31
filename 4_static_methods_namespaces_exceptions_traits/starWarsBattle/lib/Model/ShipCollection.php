<?php

namespace Model;

// ShipCollection is a class, but its only purpose is to be a wrap around an array
class ShipCollection implements \ArrayAccess

{

	/**
     * @var AbstractShip[]
	 */

	// this will be an array of ship objects
	private $ships;

	public function __construct(array $ships) 
	{
		$this->ships = $ships;

	}

	public function offsetExists($offset)
    {
        return array_key_exists($offset, $this->ships);
    }

    public function offsetGet($offset)
    {
        return $this->ships[$offset];
    }

    public function offsetSet($offset, $value)
    {
        $this->ships[$offset] = $value;
    }

    public function offsetUnset($offset)
    {
        unset($this->ships[$offset]);
    }
	
}