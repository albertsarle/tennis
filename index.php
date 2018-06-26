<?php

use Sarle\Tennis\Match;

require "vendor/autoload.php";

$match = new Match('Jugador 1', 'Jugador 2');


$match->newPointFor('Jugador 1');
$match->newPointFor('Jugador 2'); // 15 - 15
$match->newPointFor('Jugador 1');
$match->newPointFor('Jugador 2'); // 30 - 30
$match->newPointFor('Jugador 1'); // 40 -30
$match->newPointFor('Jugador 2'); // Deuce
$match->newPointFor('Jugador 1'); // ADVANTAGE Jugador 1
$match->newPointFor('Jugador 2'); // Deuce
$match->newPointFor('Jugador 2'); // ADVANTAGE Jugador 2
$match->newPointFor('Jugador 2'); // Jugador 2 WINS

$this->assertEquals('Jugador 2 WINS', $match->getScoring() );
