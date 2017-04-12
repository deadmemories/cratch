<?php

$route = app()->make('route');

$route->add('GET', '/', '\App\Controller\Index@show');

$route->start();
