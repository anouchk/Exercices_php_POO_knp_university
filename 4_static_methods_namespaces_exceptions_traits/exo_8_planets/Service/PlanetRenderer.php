<?php

namespace Service;

use Exception\InvalidRadiusException;
use Exception\MissingHexException;
use Model\Planet\PlanetInterface;

class PlanetRenderer
{
    public function render(PlanetInterface $planet)
    {
        if (0 >= $planet->getRadius()) {
            throw new InvalidRadiusException('The radius of a planet should be greater than 0!');
        }
        if (!$planet->getHexColor()) {
            throw new MissingHexException('The hex color is missing!');
        }

        return sprintf(
            '<div style="width: %spx; height: %spx; border-radius: %spx; background-color: #%s;"></div>',
            $planet->getRadius() * 2,
            $planet->getRadius() * 2,
            $planet->getRadius(),
            $planet->getHexColor()
        );
    }
}