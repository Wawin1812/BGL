<?php

class Grid
{
    /** 
     * @var integer Grid height
     */
    private $x;
    /** 
     * @var integer Grid width
     */
    private $y;

    public function setX($x)
    {
        $this->x = $x;
    }

    public function getX()
    {
        return $this->x;
    }

    public function setY($y)
    {
        $this->y = $y;
    }

    public function getY()
    {
        return $this->y;
    }
}
