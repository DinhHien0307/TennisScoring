<?php

namespace spec;

use TennisScoring;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Player;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

class TennisScoringSpec extends ObjectBehavior
{
    protected $player_1;
    protected $player_2;

    //construct new Oject
    public function let()
    {
        $this->player_1 = new Player("player_1", 0);
        $this->player_2 = new Player("player_2", 0);
        $this->beConstructedWith($this->player_1, $this->player_2);
    }

    public function it_score_0_0_game()
    {
        $this->score()->shouldReturn("Love-Love");
    }

    public function it_score_1_0_game()
    {
        $this->player_1->getPoint(1);// add Point to Hien
        $this->score()->shouldReturn("Fifteen-Love");
    }

    public function it_score_2_0_game()
    {
        $this->player_1->getPoint(2);
        $this->score()->shouldReturn("Thirty-Love");
    }

    public function it_score_3_0_game()
    {
        $this->player_1->getPoint(3);
        $this->score()->shouldReturn("Forty-Love");
    }

    public function it_score_0_3_game()
    {
        $this->player_2->getPoint(3);
        $this->score()->shouldReturn("Love-Forty");
    }

    public function it_score_1_1_game()
    {
        $this->player_1->getPoint(1);
        $this->player_2->getPoint(1);
        $this->score()->shouldReturn("Fifteen-Fifteen");
    }

    public function it_score_2_2_game()
    {
        $this->player_1->getPoint(2);
        $this->player_2->getPoint(2);
        $this->score()->shouldReturn("Thirty-Thirty");
    }

    public function it_score_4_0_game()
    {
        $this->player_1->getPoint(4);
        $this->score()->shouldReturn("Win for player_1");
    }

    public function it_score_2_4_game()
    {
        $this->player_1->getPoint(2);
        $this->player_2->getPoint(4);//add point to Dinh
        $this->score()->shouldReturn("Win for player_2");
    }

    public function it_score_3_3_game()
    {
        $this->player_1->getPoint(3);
        $this->player_2->getPoint(3);
        $this->score()->shouldReturn("Deuce");
    }

    public function it_score_4_4_game()
    {
        $this->player_1->getPoint(4);
        $this->player_2->getPoint(4);
        $this->score()->shouldReturn("Deuce");
    }

    public function it_score_4_3_game()
    {
        $this->player_1->getPoint(4);
        $this->player_2->getPoint(3);
        $this->score()->shouldReturn("Advantage for player_1");
    }

    public function it_score_5_6_game()
    {
        $this->player_1->getPoint(5);
        $this->player_2->getPoint(6);
        $this->score()->shouldReturn("Advantage for player_2");
    }

    public function it_score_8_6_game()
    {
        $this->player_1->getPoint(8);
        $this->player_2->getPoint(6);
        $this->score()->shouldReturn("Win for player_1");
    }

    public function it_score_3_1_game()
    {
        $this->player_1->getPoint(3);
        $this->player_2->getPoint(1);
        $this->score()->shouldReturn("Forty-Fifteen");
    }
    //commit
}
