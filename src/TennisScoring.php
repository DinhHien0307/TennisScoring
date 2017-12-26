<?php

class TennisScoring
{
    protected $player_1;
    protected $player_2;

    const Advantage = "Advantage for ";
    const Deuce = "Deuce";
    const Win = "Win for ";
    const enoughPointToWin = 4;
    const enoughPointToDeuce = 6;
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
            return $result .= self::Advantage . $this->leader()->getName();
        }
        if ($this->hasDeuce()) {
            return $result .= self::Deuce;
        }
        if ($this->hasWin()) {
            return $result .= self::Win .$this->leader()->getName();
        }
        $result .= $lookup[$this->player_1->getPoint()] ."-";
        $result .= $lookup[$this->player_2->getPoint()];
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
        return  abs($this->player_1->getPoint() - $this->player_2->getPoint()) == 1;
    }

    private function hasMore3PointsForEach()
    {
        return $this->player_1->getPoint() + $this->player_2->getPoint() >= self::enoughPointToDeuce;
    }

    private function tied()
    {
        return $this->player_1->getPoint() == $this->player_2->getPoint();
    }

    private function leader()
    {
        return $this->player_1->getPoint() > $this->player_2->getPoint()
             ? $this->player_1 : $this->player_2;
    }

    private function hasAtLeastTwoPointsMore()
    {
        return abs($this->player_1->getPoint() - $this->player_2->getPoint())>=2;
    }
    
    private function hasAtLeastFourPoints()
    {
        return max($this->player_1->getPoint(), $this->player_2->getPoint()) >= self::enoughPointToWin;
    }
}
