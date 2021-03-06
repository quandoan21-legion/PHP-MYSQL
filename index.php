<?php
session_start();

use Basic\Core\Router as Router;
use Basic\Core\Request as Request;
require_once "vendor/autoload.php";
require_once "src/Core/Boostrap.php";

$route = Request::route();
$method = $_SERVER['REQUEST_METHOD'];

$oRouter = new Router();
$oRouter->setRouter($aRouter)->direct($method, $route);