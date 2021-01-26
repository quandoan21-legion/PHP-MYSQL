<?php
return [
    "GET" => [
        "home"        => "HomeController@home",
        "viewHome"    => "HomeController@viewHome",
        "about"       => "AboutController@about",
        "viewAbout"   => "AboutController@viewAbout",
        "login"     => "LoginController@login",
        "getUser"     => "LoginController@getUser"
        
    ],

    "POST" => [
        "handleLogin" => "LoginController@handleLogin"
    ]
];
