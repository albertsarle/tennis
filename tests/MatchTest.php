<?php

use PHPUnit\Framework\TestCase;
use Sarle\Tennis\Match;

class MatchTest extends TestCase
{
    private $match;

    public function setUp()
    {
        $this->match = new Match('Jugador 1', 'Jugador 2');
    }


    public function testAMatchHasTwoPlayers() {
        $this->assertEquals($this->match->getPlayer1(), 'Jugador 1');
        $this->assertEquals($this->match->getPlayer2(), 'Jugador 2');

    }

    public function testANewGameHasZeroPoints()
    {
        $this->assertEquals('0 - 0', $this->match->getScoring());
    }

    public function testPlayer1WinsInARow() {

        $this->match->newPointFor('Jugador 1');
        $this->assertEquals('15 - 0', $this->match->getScoring());

        $this->match->newPointFor('Jugador 1');
        $this->assertEquals('30 - 0', $this->match->getScoring() );

        $this->match->newPointFor('Jugador 1');
        $this->assertEquals('40 - 0', $this->match->getScoring() );

        $this->match->newPointFor('Jugador 1');
        $this->assertEquals('Jugador 1 WINS', $this->match->getScoring() );
    }

    public function testPlayer2WinsInARow() {

        $this->match->newPointFor('Jugador 2');
        $this->assertEquals('0 - 15', $this->match->getScoring());

        $this->match->newPointFor('Jugador 2');
        $this->assertEquals('0 - 30', $this->match->getScoring() );

        $this->match->newPointFor('Jugador 2');
        $this->assertEquals('0 - 40', $this->match->getScoring() );

        $this->match->newPointFor('Jugador 2');
        $this->assertEquals('Jugador 2 WINS', $this->match->getScoring() );
    }


    public function testMatchIsDeuce() {

        $this->match->newPointFor('Jugador 1');
        $this->match->newPointFor('Jugador 2'); // 15 - 15
        $this->match->newPointFor('Jugador 1');
        $this->match->newPointFor('Jugador 2'); // 30 - 30
        $this->match->newPointFor('Jugador 1'); // 40 -30
        $this->match->newPointFor('Jugador 2'); // Deuce

        $this->assertEquals('DEUCE', $this->match->getScoring() );
    }

    public function testPlayer1GetsAdvantage() {

        $this->match->newPointFor('Jugador 1');
        $this->match->newPointFor('Jugador 2'); // 15 - 15
        $this->match->newPointFor('Jugador 1');
        $this->match->newPointFor('Jugador 2'); // 30 - 30
        $this->match->newPointFor('Jugador 1'); // 40 -30
        $this->match->newPointFor('Jugador 2'); // Deuce
        $this->match->newPointFor('Jugador 1'); // 40 -30

        $this->assertEquals('ADVANTAGE Jugador 1', $this->match->getScoring() );
    }

    public function testPlayer1WinsFromAdvantage() {

        $this->match->newPointFor('Jugador 1');
        $this->match->newPointFor('Jugador 2'); // 15 - 15
        $this->match->newPointFor('Jugador 1');
        $this->match->newPointFor('Jugador 2'); // 30 - 30
        $this->match->newPointFor('Jugador 1'); // 40 -30
        $this->match->newPointFor('Jugador 2'); // Deuce
        $this->match->newPointFor('Jugador 1'); // 40 -30
        $this->match->newPointFor('Jugador 1'); // 40 -30

        $this->assertEquals('Jugador 1 WINS', $this->match->getScoring() );
    }


    public function testPlayer2WinsAfterComeback() {

        $this->match->newPointFor('Jugador 1');
        $this->match->newPointFor('Jugador 2'); // 15 - 15
        $this->match->newPointFor('Jugador 1');
        $this->match->newPointFor('Jugador 2'); // 30 - 30
        $this->match->newPointFor('Jugador 1'); // 40 -30
        $this->match->newPointFor('Jugador 2'); // Deuce
        $this->match->newPointFor('Jugador 1'); // ADVANTAGE Jugador 1
        $this->match->newPointFor('Jugador 2'); // Deuce
        $this->match->newPointFor('Jugador 2'); // ADVANTAGE Jugador 2
        $this->match->newPointFor('Jugador 2'); // Jugador 2 WINS

        $this->assertEquals('Jugador 2 WINS', $this->match->getScoring() );
    }
}
