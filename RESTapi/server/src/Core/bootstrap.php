<?php

use Basic\Database\DBConnector;
use Dotenv\Dotenv;

require_once "vendor/autoload.php";
global $wpdb;

$dotenv = new DotEnv(dirname(dirname(__DIR__)));
$dotenv->load();

$oDBCOnnector = DBConnector::connect();

 /**
  *  @var \mysqli $wpdb
  */

$wpdb = $oDBConnector->oDB;