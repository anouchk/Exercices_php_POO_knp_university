<?php

namespace Service;
use Model\RebelShip;
use Model\Ship;
use Model\AbstractShip;

class ShipLoader
{
    private $shipStorage;

    public function __construct(ShipStorageInterface $shipStorage)
    {
        $this->shipStorage = $shipStorage;
    }

    /**
     * @return AbstractShip[]
     */
    public function getShips()
    {
        
        $ships = array();
        try {
            $shipsData = $this->shipStorage->fetchAllShipsData();
        } catch (\PDOException $e) {
            // var_dump($e);
            trigger_error('Database Exception! '. $e->getMessage());
            $shipsData=[];
        }
        // $shipsData = $this->queryForShips();
        foreach ($shipsData as $shipData) {
            $ships[] = $this->createShipFromData($shipData);
        }

        return $ships;
    }

    // private function queryForShips()
    // {
    //     try {
    //         return $this->shipStorage->fetchAllShipsData();
    //     } catch (\PDOException $e) {
    //         // var_dump($e);
    //         trigger_error('Database Exception! '. $e->getMessage());
    //         $shipsData=[];
    //     }
    // }

    /**
     * @param $id
     * @return AbstractShip
     */
    public function findOneById($id)
    {
        $shipArray = $this->shipStorage->fetchSingleShipData($id);

        return $this->createShipFromData($shipArray);
    }

    private function createShipFromData(array $shipData)
    {
        if ($shipData['team'] == 'rebel') {
            $ship = new RebelShip($shipData['name']);
        } else {
            $ship = new Ship($shipData['name']);
            $ship->setJediFactor($shipData['jedi_factor']);
        }

        $ship->setId($shipData['id']);
        $ship->setWeaponPower($shipData['weapon_power']);
        $ship->setStrength($shipData['strength']);

        return $ship;
    }   
}

