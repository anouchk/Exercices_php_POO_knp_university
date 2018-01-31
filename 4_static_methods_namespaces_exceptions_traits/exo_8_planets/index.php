<?php

require __DIR__ . '/vendor/autoload.php';

use Model\Planet\GasPlanet;
use Model\Planet\SolidPlanet;
use Service\PlanetRenderer;

$renderer = new PlanetRenderer();

$planets = [
    new SolidPlanet('Mercury', 10, 'cccccc'),
    new SolidPlanet('Venus', 30, '29A1FF'),
    new SolidPlanet('Earth', 30, '0E1338'),
    new SolidPlanet('Mars', 15, 'DAA18A'),
    new GasPlanet('Jupiter', GasPlanet::MATERIAL_HYDROGEN, 139),
    new GasPlanet('Saturn', GasPlanet::MATERIAL_HYDROGEN, 120),
    new GasPlanet('Uranus', GasPlanet::MATERIAL_METHANE, 51),
];
$neptune = new GasPlanet('Neptune', GasPlanet::MATERIAL_HYDROGEN, 49);
$planets[] = $neptune;

?>
<?php foreach ($planets as $planet) : ?>
    <h3><?php echo $planet; ?></h3>
    <div>
        <?php echo $renderer->render($planet); ?>
    </div>
<?php endforeach; ?>