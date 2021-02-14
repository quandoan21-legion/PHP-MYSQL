<?php
return [
    "GET" => [
        "login"    => "LoginController@login",
        "register" => "LoginController@register",
        "getPost" => "LoginController@getPost",
        "createPost" => "LoginController@createPost",
        "showPost" => "LoginController@showPost",
        "logout" => "LoginController@logout"
    ],

    "POST" => [
        "handleLogin"    => "LoginController@handleLogin",
        "handlePost"     => "LoginController@handlePost",
        "handleRegister" => "LoginController@handleRegister"
    ]
];
