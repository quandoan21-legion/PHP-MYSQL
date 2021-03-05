<?php
namespace Basic\Core;

class Request
{
    public static function route()
    {
        if (isset($_SERVER['REQUEST_URI']) && !empty($_SERVER['REQUEST_URI'])) {
            $aParseURL = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
            return isset($aParseURL[0]) ? $aParseURL[0] : 'login';
        }

        return isset($_REQUEST['route']) ? $_REQUEST['route'] : 'login';
    }

    public static function method()
    {
        Request::route();
        return $_SERVER['REQUEST_METHOD'];
    }
}
