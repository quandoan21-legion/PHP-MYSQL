<?php
class Request
{
    public static function route()
    {
        return isset($_REQUEST['route']) ? $_REQUEST['route'] : 'home';
    }

    public static function method()
    {
        Request::route();
        return $_SERVER['REQUEST_METHOD'];
    }
}
