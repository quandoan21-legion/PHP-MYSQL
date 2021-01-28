<?php
return [
    "GET" => [
        "home"        => "HomeController@home",
        "viewhome"    => "HomeController@viewhome",
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
