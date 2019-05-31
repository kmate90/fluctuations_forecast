<?php

require __DIR__.'/vendor/autoload.php';
use Symfony\Component\Console\Application;
use App\Console\ForecastCommand;


$app = new Application('Console App', 'v1.0.0');
$app -> add(new ForecastCommand());
$app -> run();