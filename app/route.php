<?php

$route = app()->get('route');

$route->add('GET', '/', '\App\Controller\Index@show');

$route->add(
    ['GET', 'POST'], '/route{string}/{integer}-any', '\App\Controller\Index@show',
    [
        'middleware' => [
            'auth',
            'admin',
        ],
    ]
);

$route->start();