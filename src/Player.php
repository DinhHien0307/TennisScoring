<?php

class Player
{
    private $name;
    private $point;

    public function __construct($name, $point)
    {
        $this->name = $name;
        $this->point = $point;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPoint()
    {
        return $this->point;
    }

    public function setPoint($point)
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
