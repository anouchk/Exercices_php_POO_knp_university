<?php

namespace Model\Planet;

interface PlanetInterface
{
    /**
     * Return name of the planet
     *
     * @return string
     */
    public function getName();

    /**
     * Return the radius if the planet, in thousands of kilometers.
     *
     * @return integer
     */
    public function getRadius();

    /**
     * Return the hex color (without the #) for the planet.
     *
     * @return string
     */
    public function getHexColor();
}