<?php

require __DIR__.'/../vendor/autoload.php';

$app = new \Cratch\App();

$array = [
    'key1' => 'value1',
    'key2' => 'value2',
];

$a = collection($array);

dd($a);