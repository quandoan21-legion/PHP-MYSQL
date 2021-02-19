<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require "vendor/autoload.php";
use Basic\Core\Router as Router;
use Basic\Core\Request as Request;
use Basic\Core\App as App;

App::set('configs/database', include "configs/database.php");

$aRouter = include "configs/router.php";

function loadView($file)
{
  if (strpos($file, ".php") === false) {
    $file .= ".php";
  }
  $file = "src/Views/" . $file;
  if (file_exists($file)) {
    include $file;
  }
}

$route = Request::route();
$method = Request::method();

$oRouter = new Router();
$oRouter->setRouter($aRouter)->direct($method, $route);
