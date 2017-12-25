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
            throw new InvalidArgumentException("should not negative number");
        }

        if (!is_numeric($point)) {
            throw new InvalidArgumentException("should be a number");
        }
        $this->point = $point;
    }
}
