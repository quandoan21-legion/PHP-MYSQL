<?php
require "vendor/autoload.php";
use Basic\Core\Router as Router;
use Basic\Core\Request as Request;
use Basic\Core\App as App;
use Basic\Database\ConstructDatabase as ConstructDatabase;
use Basic\Database\ConstructUsersTable as ConstructUsersTable;
use Basic\Database\ConstructPostsTable as ConstructPostsTable;
use Basic\Database\CheckDatabaseExist as CheckDatabaseExist;


App::set('configs/database', include "configs/database.php");
CheckDatabaseExist::CheckDatabaseExist();

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
$method = $_SERVER['REQUEST_METHOD'];

$oRouter = new Router();
$oRouter->setRouter($aRouter)->direct($method, $route);
