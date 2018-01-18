<?php

namespace Model\Planet;

use PlanetInterface;

class RandomlyColoredPlanet implements PlanetInterface
{
    private $color1;
    private $color2;

    public function __construct($color1, $color2)
    {
        $this->color1 = $color1;
        $this->color2 = $color2;
    }

    public function getRandomColor()
    {
        $colors = [$this->color1, $this->color2];

        $randomKey = array_rand($colors);

        return $colors[$randomKey];
    }

    public function getHexColor()
    {
        return $this->getRandomColor();
    }

    public function getRadius()
    {
        return 100;
    }
}