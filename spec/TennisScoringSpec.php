<?php

namespace spec;

use TennisScoring;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TennisScoringSpec extends ObjectBehavior
{
    function it_is_a_0_0_game()
    {
        $this->score()->shouldBe("Love-Love");
    }
}
