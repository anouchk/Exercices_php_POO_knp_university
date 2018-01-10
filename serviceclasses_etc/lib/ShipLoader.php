<?php

class ShipLoader {

	public function getShips() {

		$shipsData = $this->queryForShips();
		// var_dump($shipsData) ; die;

	    $ships = array(); 
	    // on boucle pour créer un nouvel objet Ship à chaque fois
	    foreach($shipsData as $shipData) {
	    	$ships[] = $this->createShipFromData($shipData);
	    }

	    // $ship = new Ship();
	    // $ship->setName("Jedi Starfighter");
	    // $ship->setWeaponPower (5);
	    // $ship->setJediFactor(15);
	    // $ship->setStrength(30);
	    // $ships['starfighter'] = $ship;

	    // $ship2 = new Ship();
	    // $ship2->setName("CloakShape Fighter");
	    // $ship2->setWeaponPower (2);
	    // $ship2->setJediFactor(2);
	    // $ship2->setStrength(70);
	    // $ships['cloakshape_fighter'] = $ship2;

	    // $ship3 = new Ship();
	    // $ship3->setName("Super Star Destroyer");
	    // $ship3->setWeaponPower (70);
	    // $ship3->setJediFactor(0);
	    // $ship3->setStrength(500);
	    // $ships['super_star_destroyer'] = $ship3;

	    // $ship4 = new Ship();
	    // $ship4->setName("RZ-1 A-wing interceptor");
	    // $ship4->setWeaponPower (4);
	    // $ship4->setJediFactor(4);
	    // $ship4->setStrength(50);
	    // $ships['rz1_a_wing_interceptor'] = $ship4;

	    // var_dump($ships);

	    return $ships;

	}

	public function findOneById($id) {
		$pdo = new PDO('mysql:host=localhost;dbname=oo_battle', 'root', 'root');
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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
		$pdo = new PDO('mysql:host=localhost;dbname=oo_battle', 'root', 'root');
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$statement = $pdo->prepare('SELECT * FROM ship');
		$statement->execute();
		$shipsArray = $statement->fetchAll(PDO::FETCH_ASSOC);

		return $shipsArray ;
	}

}