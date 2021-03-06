<?php
include 'Direction.php';
include 'Grid.php';

class Bike
{

    public $map;
    private $grid;
    private $direction;
    private $isPlaced = false;

    function __construct($map)
    {
        $this->grid = new Grid();
        $this->map = $map;
    }

    function validateIsPlaced()
    {
        // Check if initial location has been placed or not
        if (!$this->isPlaced) {
            echo "ERROR 2001: You need to set initial place location by setting PLACE. <i.e. PLACE 0,5,NORTH> \n";
            return;
            //return throw new Exception('You need to set initial place location by setting PLACE. <i.e. PLACE 0,5,NORTH>');
        }
        return $this->isPlaced;
    }

    function place($x, $y, $direction)
    {
        // validate x, y and direction
        if (
            $x == "" || !is_numeric($x) || $y == "" || !is_numeric($y) ||
            empty($direction) || !in_array(strtoupper($direction), Direction::DIRECTIONS)
        ) {
            echo "ERROR 1004: Invalid input for PLACE! <i.e. PLACE 0,5,NORTH> \n";
            return;
            //return throw new Exception('Invalid input for PLACE! <i.e. PLACE 0,5,NORTH>');
        }

        // convert string to integer
        $x = intval($x);
        $y = intval($y);

        // validate x, y with gridX and gridY
        if ($this->map->validateLocation($x, $y)) {
            $this->isPlaced = true;
            $this->grid->setX($x);
            $this->grid->setY($y);
            $this->direction = strtoupper($direction);
        }
    }

    function turn($type)
    {
        // check if initial place location not set, return empty
        if (!$this->validateIsPlaced()) return;

        $this->direction = Direction::getTurnedDirection($this->direction, $type);
    }

    function forward($direction = "")
    {
        // check if initial place location not set, return empty
        if (!$this->validateIsPlaced()) return;

        $direction = $direction ? $direction : $this->direction;
        $x = $this->grid->getX();
        $y = $this->grid->getY();

        switch ($direction) {
            case "NORTH":
                $y++;
                break;
            case "SOUTH":
                $y--;
                break;
            case "EAST":
                $x++;
                break;
            case "WEST":
                $x--;
                break;
        }

        // validate x, y with gridX and gridY
        if ($this->map->validateLocation($x, $y)) {
            $this->grid->setX($x);
            $this->grid->setY($y);
        }
    }

    function gpsReport($x = "", $y = "", $direction = "")
    {
        // check if initial place location not set, return empty
        if (!$this->validateIsPlaced()) return;

        $x = $x !== "" ? $x : $this->grid->getX();
        $y = $y !== "" ? $y : $this->grid->getY();
        $direction = $direction ? $direction : $this->direction;

        $msg = sprintf("(%d, %d), %s", $x, $y, $direction);

        echo $msg . "\n";
    }
}
