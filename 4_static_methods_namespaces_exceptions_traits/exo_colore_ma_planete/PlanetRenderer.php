<?php

namespace Service;

use PlanetInterface;

class PlanetRenderer
{
    public function render(PlanetInterface $planet)
    {
        return sprintf(
            '<div style="width: %spx; height: %spx; border-radius: %spx; background-color: #%s;"></div>',
            $planet->getRadius() * 2,
            $planet->getRadius() * 2,
            $planet->getRadius(),
            $planet->getHexColor()
        );
    }
}