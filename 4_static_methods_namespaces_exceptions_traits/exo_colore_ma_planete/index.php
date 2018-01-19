<?php

spl_autoload_register(function ($class) {
    require __DIR__ . '/src/' . str_replace('\\', '/', $class) . '.php';
});

use Model\Planet\RandomlyColoredPlanet;
use Model\Planet\GasPlanet;
use Model\Planet\SolidPlanet;
use Service\PlanetRenderer;

$planet1 = new GasPlanet(GasPlanet::MATERIAL_AMMONIA, 49);
$planet2 = new SolidPlanet(27, '353535');
$planet3 = new RandomlyColoredPlanet('0969F9', 'F96909');

$renderer = new PlanetRenderer();
echo $renderer->render($planet1);
echo $renderer->render($planet2);
echo $renderer->render($planet3);