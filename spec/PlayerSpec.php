<?php

namespace spec;

use Player;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use SebastianBergmann\ObjectReflector\InvalidArgumentException;

class PlayerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Player::class);
    }

    protected $player_1;
    protected $player_2;

    //construct new Oject
    public function let()
    {
        $this->player_1 = new Player("player_1", 0);
        $this->player_2 = new Player("player_2", 0);
        $this->beConstructedWith($this->player_1, $this->player_2);
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
