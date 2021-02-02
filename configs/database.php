<?php
return [
    "users" => [
        "ID"       => "int(12) NOT NULL AUTO_INCREMENT PRIMARY KEY",
        "username" => "varchar(50) NOT NULL UNIQUE",
        "email"    => "varchar(50) NOT NULL UNIQUE",
        "password" => "varchar(50) NOT NULL ",
        "address"  => "varchar(50)",
    ],

    "posts" => [
        "ID"          => "int(12) NOT NULL AUTO_INCREMENT PRIMARY KEY",
        "postTitle"   => "varchar(50)",
        "postContent" => "varchar(50)",
        "img"         => "varchar(50)",
        "author"      => "int(12)",
    ]
];
