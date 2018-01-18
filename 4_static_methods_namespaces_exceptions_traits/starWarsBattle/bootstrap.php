<?php

$configuration = array(
    'db_dsn'  => 'mysql:host=localhost;dbname=oo_battle2',
    'db_user' => 'root',
    'db_pass' => 'root',
);

require_once __DIR__.'/lib/Service/Container.php';
require_once __DIR__.'/lib/Model/AbstractShip.php';
require_once __DIR__.'/lib/Model/Ship.php';
require_once __DIR__.'/lib/Model/RebelShip.php';
require_once __DIR__.'/lib/Model/BrokenShip.php';
// require_once __DIR__.'/lib/Service/BattleManager.php';
require_once __DIR__.'/lib/Service/ShipStorageInterface.php';
require_once __DIR__.'/lib/Service/PdoShipStorage.php';
require_once __DIR__.'/lib/Service/JsonFileShipStorage.php';
require_once __DIR__.'/lib/Service/ShipLoader.php';
require_once __DIR__.'/lib/Model/BattleResult.php';

spl_autoload_register(function($className) {
	if ($className == 'Battle\BattleManager') {
		require __DIR__.'/lib/Service/BattleManager.php';
		return;
	}
});

