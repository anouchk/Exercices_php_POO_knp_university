<?php

namespace Service;

// This is how every ShipStorage starts. 
// But LoggableStorage won't be doing any of the shiploading work. 
// It's a wrapper object that offloads the work to an internal shipStorage object.
// It will let another ShipStorage object (like PDOShipStorage) do the hard work.
// This is composition : you put one object inside of another.

class LoggableShipStorage implements ShipStorageInterface
{
	private $shipStorage;

	public function __construct(ShipStorageInterface $shipStorage) 
	{
		$this->shipStorage = $shipStorage;

	}

	public function fetchAllShipData()
	{
		return $this->shipStorage->fetchAllShipsData();
	}

	public function fetchSingleShipData($id)
	{
		return $this->shipStorage->fetchSingleShipData($id);
	}

}