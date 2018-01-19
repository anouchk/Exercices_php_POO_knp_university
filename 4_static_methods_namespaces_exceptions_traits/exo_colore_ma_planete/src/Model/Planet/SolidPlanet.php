<?php

namespace Model\Planet;

class SolidPlanet implements PlanetInterface
{
    private $radius;

    private $hexColor;

    public function __construct($radius, $hexColor)
    {
        $this->radius = $radius;
        $this->hexColor = $hexColor;
    }

    public function getRadius()
    {
        return $this->radius;
    }

    public function getHexColor()
    {
        return $this->hexColor;
    }
}