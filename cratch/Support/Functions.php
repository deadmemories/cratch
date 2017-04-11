<?php

function app()
{
    return \Cratch\Container\ServiceContainer::getInstance();
}

function collection(array $items = [])
{
    app()->setParams(
        'collection', [
            'items' => $items,
        ]
    );

    return app()->make('collection');
}

function cookie()
{
    return app()->make('cookie');
}

function dd()
{
    $args = func_get_args();
    call_user_func_array('dump', $args);
    die();
}