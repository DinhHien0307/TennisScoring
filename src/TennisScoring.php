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
            3 => "Fourty"
        ];

        $result .= $lookup[$this->player_1->point] ."-";
        $result .= $lookup[$this->player_2->point];
        return $result;
        if($this->player_1->point == 3 && $this->player_2->point == 0)
        {
            return "Fourty-Love";
        }
        if($this->player_1->point == 2 && $this->player_2->point == 0)
        {
            return "Thirty-Love";
        } 
        if($this->player_1->point == 1 && $this->player_2->point == 0)
        {
            return "Fifteen-Love";
        }
        return "Love-Love";
    }
}
