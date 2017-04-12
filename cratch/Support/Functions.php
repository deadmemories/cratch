<?php

function app()
{
    return \Cratch\Container\ServiceContainer::getInstance();
}
function cookie ()
{
    return app ()->make('cookie');
}
function dd()
{
    $args = func_get_args();
    call_user_func_array('dump', $args);
    die();
}