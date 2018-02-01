<?php

namespace Model;

trait SettableJediFactorTrait
{
	private $jediFactor;

	// The Jedi factor will vary ship by ship
	public function getJediFactor() {

		return $this->jediFactor;

	}

	public function setJefiFactor($jediFactor) {
		$this->jediFactor = $jediFactor;
	}
}