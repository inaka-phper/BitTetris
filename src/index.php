<?php

use InakaPhper\BitTetris\BitTetris;

require __DIR__.'/../vendor/autoload.php';

echo (new BitTetris($argv[1]))->play();