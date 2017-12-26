<?php

namespace spec;

use Player;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use SebastianBergmann\ObjectReflector\InvalidArgumentException;

class PlayerSpec extends ObjectBehavior
{
    protected $name;
    protected $point;

    //construct new Oject
    public function let()
    {
        $this->name = "player_1";
        $this->point = 0;
        $this->beConstructedWith($this->name, $this->point);
    }

    public function it_exception_negative_number()
    {
        $this->shouldThrow(new \InvalidArgumentException("should not negative number"))->duringSetPoint(-1);
    }

    public function it_exception_not_a_number()
    {
        $this->shouldThrow(new \InvalidArgumentException("should be a number"))->duringSetPoint("A");
    }
}
