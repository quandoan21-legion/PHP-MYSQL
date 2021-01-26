<?php
return [
    "GET" => [
        "home"        => "HomeController@home",
        "viewHome"    => "HomeController@viewHome",
        "about"       => "AboutController@about",
        "viewAbout"   => "AboutController@viewAbout",
        "login"     => "LoginController@login"
        
    ],

    "POST" => [
        "handleLogin" => "LoginController@handleLogin"
    ]
];
