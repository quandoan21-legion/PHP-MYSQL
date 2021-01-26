<?php

namespace Basic\Controllers;

class HomeController
{
    public function home()
    {
        loadview("Home/index.php");
    }

    public function viewHome()
    {
        loadview("Home/index.php");
    }
}
