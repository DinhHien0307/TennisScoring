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

    //construct new Oject
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
        $this->Hien->getPoint(1);// add Point to Hien
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

    public function it_score_1_1_game()
    {
        $this->Hien->getPoint(1);
        $this->Dinh->getPoint(1);
        $this->score()->shouldReturn("Fifteen-Fifteen");
    }

    public function it_score_2_2_game()
    {
        $this->Hien->getPoint(2);
        $this->Dinh->getPoint(2);
        $this->score()->shouldReturn("Thirty-Thirty");
    }

    public function it_score_4_0_game()
    {
        $this->Hien->getPoint(4);
        $this->score()->shouldReturn("Win for Hien");
    }

    public function it_score_2_4_game()
    {
        $this->Hien->getPoint(2);
        $this->Dinh->getPoint(4);//add point to Dinh
        $this->score()->shouldReturn("Win for Dinh");
    }

    public function it_score_3_3_game()
    {
        $this->Hien->getPoint(3);
        $this->Dinh->getPoint(3);
        $this->score()->shouldReturn("Deuce");
    }

    public function it_score_4_4_game()
    {
        $this->Hien->getPoint(4);
        $this->Dinh->getPoint(4);
        $this->score()->shouldReturn("Deuce");
    }

    public function it_score_4_3_game()
    {
        $this->Hien->getPoint(4);
        $this->Dinh->getPoint(3);
        $this->score()->shouldReturn("Advantage for Hien");
    }

    public function it_score_5_6_game()
    {
        $this->Hien->getPoint(5);
        $this->Dinh->getPoint(6);
        $this->score()->shouldReturn("Advantage for Dinh");
    }

    public function it_score_8_6_game()
    {
        $this->Hien->getPoint(8);
        $this->Dinh->getPoint(6);
        $this->score()->shouldReturn("Win for Hien");
    }

    //commit
}
