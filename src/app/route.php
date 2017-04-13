<?php

$route = app()->make('route');

$route->add('GET', '/', '\App\Controller\Index@show');
$route->add('POST', '/upload', '\App\Controller\Index@upload');

$route->start();
