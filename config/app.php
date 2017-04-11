<?php

return [
    'url' => 'localhost',

    'validate_errors' => 'ru-validate',

    'required' => [
        'route' => \Cratch\Routing\Route::class,
        'collection' => \Cratch\Collection\Collection::class,
        'cookie' =>  \Cratch\Cookie\Cookies::class
    ],
];