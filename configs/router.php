<?php
return [
    "GET" => [
        "home"        => "HomeController@home",
        "login"        => "LoginController@login",
        "register"        => "LoginController@register",

        
    ],

    "POST" => [
        "handleLogin" => "LoginController@handleLogin",
        "handleRegister" => "LoginController@handleRegister"
    ]
];
