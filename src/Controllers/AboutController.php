<?php
namespace phpBasic\Controllers;

class AboutController
{
    public function about()
    {
        loadview("About/index.php");
    }

    public function viewAbout()
    {
        loadview("About/index.php");
    }
}
