# Sarle\Tennis

This package is a test

## Installation

Here's how to use Rent:

install via composer adding the public repo in github

    "repositories": [
        {
            "url": "https://github.com/albertsarle/tennis.git",
            "type": "git"
        }
    ],
    "require-dev": {
        "AlbertSP/tennis": "dev-master"
    }

## Usage

See index.php for an example

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

echo $match->getScoring();



## Contributing

1. Fork it!
2. Create your feature branch: `git checkout -b my-new-feature`
3. Commit your changes: `git commit -am 'Add some feature'`
4. Push to the branch: `git push origin my-new-feature`
5. Submit a pull request :D

## History

Version 0.1 (2018-06-25) - Initial version

## Credits

Albert SP - 

## License

MIT License

Copyright (c) 2018 Albert SP

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
