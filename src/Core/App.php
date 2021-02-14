<?php
namespace Basic\Core;
use Basic\Database\database as database;

class App
{
    private static array $aRegistery = [];

    public static function set($key, $val)
    {
        self::$aRegistery[$key] = $val;
        return true;
    }

    public static function get($key, $default = '')
    {
        return array_key_exists($key, self::$aRegistery) ? self::$aRegistery[$key] : $default;
    }
}
