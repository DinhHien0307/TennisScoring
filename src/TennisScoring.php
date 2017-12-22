<?php

class TennisScoring
{
    protected $player_1;
    protected $player_2;

    public function __construct($player_1, $player_2)
    {
        $this->player_1 = $player_1;
        $this->player_2 = $player_2;
    }

    public function score()
    {
        $result = "";
        $lookup = [
            0 => "Love",
            1 => "Fifteen",
            2 => "Thirty",
            3 => "Forty"
        ];

        //4.
        if ($this->hasAdvantage()) {
            return $result .= "Advantage for " . $this->leader()->name;
        }

        //3.
        if ($this->hasDeuce()) {
            return $result .= "Deuce";
        }
        
        //1.
        if ($this->hasWin()) {
            return $result .= "Win for " .$this->leader()->name;
        }

        //2.
        $result .= $lookup[$this->player_1->point] ."-";
        $result .= $lookup[$this->player_2->point];
        return $result;
    }

    //2. scores from zero to three points are described as "love", "fifteen", "thirty", and "forty" respectively.

    //1.describe how to win: has more than 4p and has 2p more than opponent
    public function hasWin()
    {
        return $this->hasAtLeastFourPoints() && $this->hasAtLeastTwoPointsMore();
    }

    //3.describe how to deuce: tie and has 3p for each
    public function hasDeuce()
    {
        return $this->tied() && $this->hasMore3PointsForEach();
    }

    //4.describe how to advantage:has more than 4p and has 1p more than opponent 
    public function hasAdvantage()
    {
        return $this->hasAtLeastFourPoints() && $this->has1PointMore();
    }

    public function has1PointMore()
    {
        return  abs($this->player_1->point - $this->player_2->point) == 1;
    }

    public function hasMore3PointsForEach()
    {
        return $this->player_1->point + $this->player_2->point >=6;
    }

    public function tied()
    {
        return $this->player_1->point == $this->player_2->point;
    }

    public function leader()
    {
        return $this->player_1->point > $this->player_2->point
             ? $this->player_1 : $this->player_2;
    }

    public function hasAtLeastTwoPointsMore()
    {
        return abs($this->player_1->point - $this->player_2->point)>=2;
    }
    
    public function hasAtLeastFourPoints()
    {
        return max($this->player_1->point, $this->player_2->point)>=4;
    }
}
