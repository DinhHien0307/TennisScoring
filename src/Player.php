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
        if ($point < 0) {
            throw new InvalidArgumentException;
            return 0;
        }

        if (!is_numeric($point)) {
            throw new InvalidArgumentException;
            return 0;
        }
        $this->point = $point;
    }
}
