<?php

namespace spec;

use TennisScoring;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Player;

class TennisScoringSpec extends ObjectBehavior
{
    protected $Hien;
    protected $Dinh;
    public function let()
    {
        $this->Hien = new Player("Hien", 0);
        $this->Dinh = new Player("Dinh", 0);
        $this->beConstructedWith($this->Hien, $this->Dinh);
    }
    public function it_score_0_0_game()
    {
        $this->score()->shouldReturn("Love-Love");
    }

    public function it_score_1_0_game()
    {
        $this->Hien->getPoint(1);
        $this->score()->shouldReturn("Fifteen-Love");
    }

    public function it_score_2_0_game()
    {
        $this->Hien->getPoint(2);
        $this->score()->shouldReturn("Thirty-Love");
    }

    public function it_score_3_0_game()
    {
        $this->Hien->getPoint(3);
        $this->score()->shouldReturn("Fourty-Love");
    }
}
