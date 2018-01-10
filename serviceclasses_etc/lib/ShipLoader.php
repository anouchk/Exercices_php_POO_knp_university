<?php

class ShipLoader {

	private $pdo;

	private $dbDsn ;

	private $dbuser;

	private $dbPass;

	public function __construct($dbDsn, $dbUser, $dbPass) {
		$this->dbDsn = $dbDsn;
		$this->dbUser = $dbUser;
		$this->dbPass = $dbPass;
	}

	public function getShips() {

		$shipsData = $this->queryForShips();
		// var_dump($shipsData) ; die;

	    $ships = array(); 
	    // on boucle pour créer un nouvel objet Ship à chaque fois
	    foreach($shipsData as $shipData) {
	    	$ships[] = $this->createShipFromData($shipData);
	    }

	    return $ships;

	}

	public function findOneById($id) {
		$pdo = $this->getPDO();
		$statement = $pdo->prepare('SELECT * FROM ship WHERE ID = :id');
		$statement->execute(array('id' => $id));
		$shipArray = $statement->fetch(PDO::FETCH_ASSOC);

		if (!$shipArray) {
			return null;
		}

		// var_dump($shipArray) ; die;
		return $this->createShipFromData($shipArray);
	}

	private function createShipFromData(array $shipData) {
		$ship = new Ship($shipData['name']);
	    $ship->setId($shipData['id']);
	    $ship->setWeaponPower($shipData['weapon_power']);
	    $ship->setJediFactor($shipData['jedi_factor']);  
	    $ship->setStrength($shipData['strength']);   

	    return $ship; 
	}

	private function queryForShips () {
		$pdo = $this->getPDO();
		$statement = $pdo->prepare('SELECT * FROM ship');
		$statement->execute();
		$shipsArray = $statement->fetchAll(PDO::FETCH_ASSOC);

		return $shipsArray ;
	}

	/**
	 * @return PDO
	 */
	private function getPDO() {

		if ($this->pdo === null) {
			$pdo = new PDO($this->dbDsn, $this->dbUser, $this->dbPass);
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$this->pdo = $pdo;
		}

		return $this->pdo;

	}

}