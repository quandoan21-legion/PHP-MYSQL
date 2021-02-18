<?php
namespace Basic\Core;


class App
{
    public static array $aRegistery = [];

    public static function  set($key, $val){
        self::$aRegistery[$key] = $val;
        return true;
    } 

    public static function get($key, $default = ''){
        return array_key_exists($key, self::$aRegistery) ? self::$aRegistery[$key] : $default;
    }
}
