<?php

namespace Sarle\Tennis;

class Match
{
    /**
     * Number of points to Win the game
     */
    const WIN_GAME_POINTS = 4;
    /**
     * Minimum number of points to win the advantage game
     */
    const MINIMUM_DIFFERENCE_POINTS = 2;

    /**
     * Strings for output messages
     */
    const MSG_WINNER = ' WINS';
    const MSG_DEUCE = 'DEUCE';
    const MSG_ADVANTAGE = 'ADVANTAGE ';

    /**
     * @var string
     */
    protected $player1;

    /**
     * @var integer
     */
    protected $player1Points = 0;

    /**
     * @var string
     */
    protected $player2;

    /**
     * @var integer
     */
    protected $player2Points = 0;

    /**
     * @var array
     */
    protected $pointsDescriptions = ['0', '15','30','40'];

    /**
     * Match constructor.
     * @param $playerName1
     * @param $playerName2
     */
    public function __construct($playerName1, $playerName2)
    {
        $this->player1 = $playerName1;
        $this->player2 = $playerName2;
    }

    /**
     * @return string
     */
    public function getPlayer1()
    {
        return $this->player1;
    }

    /**
     * @return string
     */
    public function getPlayer2()
    {
        return $this->player2;
    }

    /**
     * Adds point to the given player
     *
     * @param string $playerName
     * @return void
     */
    public function newPointFor($playerName)
    {
        if ($playerName == $this->player1) {
            $this->player1Points++;
        } elseif ($playerName == $this->player2) {
            $this->player2Points++;
        }
    }
    /**
     * Gets  the points for the given player
     *
     * @param string $playerName
     * @return integer
     */
    public function getPointsFor($playerName)
    {
        if ($playerName == $this->player1) {
            return $this->player1Points;
        } elseif ($playerName == $this->player2) {
            return $this->player2Points;
        }
    }

    /**
     * Get the Match scoring
     *
     * @return string
     */
    public function getScoring()
    {
        if ($this->hasAWinner()) {
            return $this->getWinner() . self::MSG_WINNER;
        }

        if ($this->playingAdvantageGame()) {
            return self::MSG_ADVANTAGE. $this->getWinner();
        }

        if ($this->gameInDeuce()) {
            return self::MSG_DEUCE;
        }

        return $this->pointsDescriptions[$this->player1Points] .' - '.
               $this->pointsDescriptions[$this->player2Points];
    }

    /**
     * Check if the match is winned by one of the players
     *
     * @return string
     */
    public function hasAWinner()
    {
        if ($this->hasReachedWinPoints()
              && $this->minimumPointsDistance()
        ) {
            return true;
        }
        return false;
    }

    /**
     * Get the player with the most points as the winner of the game
     *
     * @return string
     */
    public function getWinner()
    {
        if ($this->player1Points > $this->player2Points) {
            return $this->player1;
        } else {
            return $this->player2;
        }
    }

    /**
     * Checks if at least one of the two players has reached the win points
     * @return bool
     */
    public function hasReachedWinPoints()
    {
        return $this->player1Points >= self::WIN_GAME_POINTS
                || $this->player2Points >= self::WIN_GAME_POINTS;
    }

    /**
     * Checks if exists the minimum points distance between two players to have a win
     * @return bool
     */
    public function minimumPointsDistance()
    {
        return abs($this->player1Points - $this->player2Points) >= self::MINIMUM_DIFFERENCE_POINTS;
    }

    /**
     * Are we playing the advantage game?
     * @return bool
     */
    public function playingAdvantageGame()
    {
        return $this->hasReachedWinPoints()
            && abs($this->player1Points - $this->player2Points)==1;
    }

    /**
     * Do the two players have the same points, then they are tied
     * @return bool
     */
    public function arePlayersTied()
    {
        return $this->player1Points == $this->player2Points;
    }

    public function gameInDeuce()
    {
        return $this->arePlayersTied()
            && $this->player1Points >= self::WIN_GAME_POINTS -1
            && $this->player2Points >= self::WIN_GAME_POINTS -1;
    }
}
