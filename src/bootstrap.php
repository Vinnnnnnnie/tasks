<?php

define('APP_ROOT', dirname(__FILE__, 2));

include APP_ROOT . '/resources/functions.php';
include APP_ROOT . '/resources/config.php';

spl_autoload_register(function ($class) {
    $str = str_replace('\\', '/', $class);
    if (file_exists(APP_ROOT. '/' . $str . '.php'))
    {
        include (APP_ROOT. '/' . $str . '.php');
    }
});

if (DEV !== true)
{
    set_exception_handler('handle_exception');
    set_error_handler('handle_error');
    register_shutdown_function('handle_shutdown');
}

$CMS = new \Controllers\CMS($dsn, $db_user, $db_pass);
unset($dsn, $db_user, $db_pass);