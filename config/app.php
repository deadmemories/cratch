<?php

return [
    'url' => 'localhost',

    'validate_errors' => 'ru-validate',

    'required' => [
        'route' => \Cratch\Routing\Route::class,
        'cookie' =>  \Cratch\Cookie\Cookies::class
    ],
];