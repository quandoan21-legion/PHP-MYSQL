<?php
return [
    "GET" => [
        "login"    => "UserController@login",
        "register" => "UserController@register",
        "createPost" => "PostController@createPost",
        "showPost" => "PostController@showPost",
        "logout" => "UserController@logout"
    ],

    "POST" => [
        "handleLogin"    => "UserController@handleLogin",
        "handlePost"     => "PostController@handlePost",
        "handleRegister" => "UserController@handleRegister"
    ]
];
