<?php

class Map
{
    public $gridX;
    public $gridY;
    /**
     * Create new Table instance
     * @param integer height
     * @param integer width
     * @return void
     */
    function __construct($gridX, $gridY)
    {
        $this->gridX = $gridX;
        $this->gridY = $gridY;
    }
    /**
     * Check whether given x,y coordinates fall within grid bounds
     * @param integer $gridX
     * @param integer $gridY
     * @return boolean
     */
    function validateLocation($x, $y, $gridX = "", $gridY = "")
    {
        $gridX = $gridX !== "" ? $gridX : $this->gridX;
        $gridY = $gridY !== "" ? $gridY : $this->gridY;

        if ($x < 0 || $x > ($gridX - 1) || $y < 0 || $y > ($gridY - 1)) {
            echo "Oops! Out of track! \n";
            return false;
            //return throw new Exception('Oops! Out of track!');
        }

        return true;
    }
}
