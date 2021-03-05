<?php

use Basic\Core\Router as Router;
use Basic\Core\Request as Request;
use Basic\Core\App;
use Basic\Database\MySqlConnect as MySqlConnect;

require_once "vendor/autoload.php";
require_once "src/Core/Boostrap.php";

$route = Request::route();
$method = Request::method();

$oRouter = new Router();
$oRouter->setRouter($aRouter)->direct($method, $route);
