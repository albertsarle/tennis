<?php

use Sarle\Tennis\Match;

require "vendor/autoload.php";

$this->match = new Match('Jugador 1', 'Jugador 2');

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

echo $this->match->getScoring();
