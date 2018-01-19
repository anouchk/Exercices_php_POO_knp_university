<?php

$configuration = array(
    'db_dsn'  => 'mysql:host=localhost;dbname=oo_battle2',
    'db_user' => 'root',
    'db_pass' => 'root',
);

spl_autoload_register(function($className) {
	// we replace the backslash with a forward slash
	$path = __DIR__.'/lib/'.str_replace('\\','/', $className).'.php';

	if(file_exists($path)) {
		require $path;
	}
});

