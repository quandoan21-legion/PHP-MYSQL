<?php
return [
    "GET" => [
        "home"        => "HomeController@home",
        "viewHome"    => "HomeController@viewHome",
        "about"       => "AboutController@about",
        "viewAbout"   => "AboutController@viewAbout",
        "login"     => "LoginController@login",
        "getUser"     => "LoginController@getUser",
        "insertUser"     => "LoginController@insertUser",
        "updateUser"     => "LoginController@updateUser",
        "deleteUser"     => "LoginController@deleteUser"
        
    ],

    "POST" => [
        "handleLogin" => "LoginController@handleLogin"
    ]
];
