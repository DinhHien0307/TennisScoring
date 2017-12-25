<?php

class TennisScoring
{
    protected $player_1;
    protected $player_2;

    /**
     * Create player instance
     *
     * @param object $player1
     * @param object $player2
     */
    public function __construct($player_1, $player_2)
    {
        $this->player_1 = $player_1;
        $this->player_2 = $player_2;
    }

    //main function convert score to string
    //@return string
    public function score()
    {
        $result = "";

        // array for exchanging
        $lookup = [
            0 => "Love",
            1 => "Fifteen",
            2 => "Thirty",
            3 => "Forty"
        ];
        if ($this->hasAdvantage()) {
            return $result .= "Advantage for " . $this->leader()->name;
        }
        if ($this->hasDeuce()) {
            return $result .= "Deuce";
        }
        if ($this->hasWin()) {
            return $result .= "Win for " .$this->leader()->name;
        }
        $result .= $lookup[$this->player_1->point] ."-";
        $result .= $lookup[$this->player_2->point];
        return $result;
    }
    private function hasWin()
    {
        return $this->hasAtLeastFourPoints() && $this->hasAtLeastTwoPointsMore();
    }

    //describe how to deuce: tie and has 3p for each
    private function hasDeuce()
    {
        return $this->tied() && $this->hasMore3PointsForEach();
    }

    //describe how to advantage:has more than 4p and has 1p more than opponent
    private function hasAdvantage()
    {
        return $this->hasAtLeastFourPoints() && $this->has1PointMore();
    }

    private function has1PointMore()
    {
        return  abs($this->player_1->point - $this->player_2->point) == 1;
    }

    private function hasMore3PointsForEach()
    {
        return $this->player_1->point + $this->player_2->point >=6;
    }

    private function tied()
    {
        return $this->player_1->point == $this->player_2->point;
    }

    private function leader()
    {
        return $this->player_1->point > $this->player_2->point
             ? $this->player_1 : $this->player_2;
    }

    private function hasAtLeastTwoPointsMore()
    {
        return abs($this->player_1->point - $this->player_2->point)>=2;
    }
    
    private function hasAtLeastFourPoints()
    {
        return max($this->player_1->point, $this->player_2->point)>=4;
    }
}
