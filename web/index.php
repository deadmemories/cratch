<?php

require __DIR__.'/../vendor/autoload.php';

$app = new \Cratch\App();

$array = [
    'key1' => 'value1',
    'key2' => 'value2',
    'key3' => 'value3'
];

$a = collection($array);

$a->only(['key1', 'key2', 'key4']);

dd($a);