<?php

class Player
{
    public $name;
    public $point;

    public function __construct($name, $point)
    {
        $this->name = $name;
        $this->point = $point;
    }

    public function getPoint($point)
    {
        $this->point = $point;
    }
}
?>