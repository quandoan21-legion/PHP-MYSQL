<?php
return [
    "GET" => [
        "home"     => "HomeController@home",
        "login"    => "LoginController@login",
        "register" => "LoginController@register",
        "getPost" => "LoginController@getPost",
        "createPost" => "LoginController@createPost",
        "showPost" => "LoginController@showPost"
    ],

    "POST" => [
        "handleLogin"    => "LoginController@handleLogin",
        "handlePost"     => "LoginController@handlePost",
        "handleRegister" => "LoginController@handleRegister"
    ]
];
