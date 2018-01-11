<?php

class Container {
	public function getPDO() {

		$configuration = array (
			'db_dsn' => 'mysql:host=localhost; dbname=oo_battle',
			'db_user' => 'root',
			'db_pass' =>'root'
		);


		$pdo = new PDO (
		    $configuration['db_dsn'],
		    $configuration['db_user'],
		    $configuration['db_pass']
		);

		return $pdo;

	}
}