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

function mainConfig()
{
    return app()->make('mainConfig');
}

function userConfig()
{
    return app()->make('userConfig');
}

function dd()
{
    $args = func_get_args();
    call_user_func_array('dump', $args);
    die();
}