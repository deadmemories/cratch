<?php

if (! function_exists('app')) {
    function app()
    {
        return \Cratch\Container\ServiceContainer::getInstance();
    }
}

if (! function_exists('collection')) {
    function collection(array $items = [])
    {
        app()->setParams(
            'collection', [
                'items' => $items,
            ]
        );

        return app()->make('collection');
    }
}

if (! function_exists('cookie')) {
    function cookie()
    {
        return app()->make('cookie');
    }
}

if (! function_exists('mainConfig')) {
    function mainConfig()
    {
        return app()->make('mainConfig');
    }
}

if (! function_exists('userConfig')) {
    function userConfig()
    {
        return app()->make('userConfig');
    }
}

if (! function_exists('dd')) {
    function dd()
    {
        $args = func_get_args();
        call_user_func_array('dump', $args);
        die();
    }
}