<?php
namespace Basic\Core;

class Request
{
    public static function route()
    {
        return isset($_REQUEST['route']) ? $_REQUEST['route'] : 'login';
    }

    public static function method()
    {
        Request::route();
        return $_SERVER['REQUEST_METHOD'];
    }
}
