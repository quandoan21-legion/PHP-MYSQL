<?php
return [
    "GET" => [
        "home"        => "HomeController@home",
        "viewhome"    => "HomeController@viewhome",
        "about"       => "AboutController@about",
        "viewAbout"   => "AboutController@viewAbout",
        "login"     => "LoginController@login",
        "getUser"     => "LoginController@getUser"
        
    ],

    "POST" => [
        "handleLogin" => "LoginController@handleLogin"
    ]
];
