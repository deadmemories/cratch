<?php

return [
    'url' => 'localhost',

    'validate_errors' => 'ru-validate',

    'required' => [
        'route' => \Cratch\Routing\Route::class,
        'cookie' => \Cratch\Cookie\Cookies::class,
        'collection' => \Cratch\Collection\Collection::class,
        'uploadSystem' => [
            \Cratch\Files\Files::class,
            [
                \Cratch\Contracts\Files\FilesInterface::class => \Cratch\Files\UploadSystem\UploadSystem::class,
            ],
        ],
        'fileSystem' => [
            \Cratch\Files\Files::class,
            [
                \Cratch\Contracts\Files\FilesInterface::class => \Cratch\Files\FilesSystem\FilesSystem::class,
            ],
        ],
    ],
];