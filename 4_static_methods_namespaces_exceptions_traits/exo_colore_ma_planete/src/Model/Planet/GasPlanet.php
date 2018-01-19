<?php

namespace Model\Planet;

class GasPlanet implements PlanetInterface
{
    const MATERIAL_AMMONIA = 'ammonia';
    const MATERIAL_HYDROGEN = 'hydrogen';
    const MATERIAL_HELIUM = 'helium';
    const MATERIAL_METHANE = 'methane';

    private $diameter;

    private $mainElement;

    public function __construct($mainElement, $diameter)
    {
        $this->diameter = $diameter;
        $this->mainElement = $mainElement;
    }

    public static function getAllElements()
    {
        return [
            self::MATERIAL_AMMONIA,
            self::MATERIAL_HYDROGEN,
            self::MATERIAL_HELIUM,
            self::MATERIAL_METHANE,
        ];
    }

    public function getRadius()
    {
        return $this->diameter / 2;
    }

    public function getHexColor()
    {
        // a "fake" map of elements to colors
        switch ($this->mainElement) {
            case self::MATERIAL_AMMONIA:
                return '663300';
            case self::MATERIAL_HYDROGEN:
                return '464646';
            case self::MATERIAL_HELIUM:
                return 'FFFF66';
            case self::MATERIAL_METHANE:
                return '0066FF';
            default:
                return '464646';
        }
    }
}