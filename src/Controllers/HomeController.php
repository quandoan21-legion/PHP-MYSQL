<?php

namespace Basic\Controllers;

class HomeController
{
    public function home()
    {
        loadview("Home/index.php");
    }

    public function viewhome()
    {
        loadview("Home/lamo.php");
    }
}
