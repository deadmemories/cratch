<?php

require __DIR__.'/../vendor/autoload.php';

$app = new \Cratch\App();

dd(app()->make('request'));