<?php

return [
    'url' => 'localhost',

    'validate_errors' => 'ru-validate',

    'types_file' => 'html',

    'required' => [
        'route' => \Cratch\Routing\Route::class,
        'cookie' => \Cratch\Cookie\Cookies::class,
        'collection' => \Cratch\Collection\Collection::class,
        'storage' => [
            \Cratch\Files\Storage::class,
            [
                \Cratch\Files\FileHelper::class => \Cratch\Files\FileHelper::class,
            ],
        ],
        'uploadFiles' => \Cratch\Files\UploadSystem\Upload::class,
        'uploadImage' => \Cratch\Files\UploadSystem\ImageUpload::class,
        'entityManager' => \Cratch\Doctrine::class,
        'response' => \Cratch\Http\Response::class,
        'request' => \Cratch\Http\Request::class,
    ],
];