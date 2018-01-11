<?php

class BattleResult {

	private $usedJediPowers;
	private $winningShip;
	private $losingShip;

	// on veut que les bateaux soient un objet de la classe Ship, mais parfois ils se détruisent l'un l'autre et deviennent donc null : return Ship|null
	public function __construct($usedJediPowers, Ship $winningShip = null, Ship $losingShip = null) {

		$this->usedJediPowers=$usedJediPowers;
		$this->winningShip=$winningShip;
		$this->losingShip=$losingShip;
	}

	public function getWinningShip() {
		return $this->winningShip ;
	}

	public function wereJediPowersUsed() {
		return $this->usedJediPowers ;
	}

	public function getLosingShip() {
		return $this->losingShip ;
	}

	public function isThereAWinner() {
		return $this->getWinningShip() !== null;
	}

}