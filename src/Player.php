<?php

class Player
{
    private $name;
    private $point;

    public function __construct($name, $point)
    {
        $this->checkException($point);
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

    /**
     * function setPoint with check value
     *
     * @param $point
     * @return $point
     */
    public function setPoint($point)
    {
        $this->checkException($point);
        $this->point = $point;
    }

    private function checkException($point)
    {
        if ($point < 0) {
            throw new InvalidArgumentException("should not negative number");
        }

        if (!is_numeric($point)) {
            throw new InvalidArgumentException("should be a number");
        }
    }
}
