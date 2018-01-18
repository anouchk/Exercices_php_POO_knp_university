<?php

require __DIR__ . '/PlanetRenderer.php';
require __DIR__ . '/PlanetInterface.php';

spl_autoload_register(function($className) {
    if ($className == 'Model\Planet\RandomlyColoredPlanet') {
        require __DIR__.'/RandomlyColoredPlanet.php';
    }
});

use Model\Planet\RandomlyColoredPlanet;
use Service\PlanetRenderer;

$planet = new RandomlyColoredPlanet('0969F9', 'F96909');

$renderer = new PlanetRenderer();
echo $renderer->render($planet);