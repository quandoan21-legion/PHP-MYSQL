<?php
session_start();
require_once "../../vendor/autoload.php";

use RESTapi\Database\DBConnector;
use RESTapi\Users\Controller\UserController;
use Dotenv\Dotenv;

global $wpdb;

$dotenv = new DotEnv(dirname(dirname(__DIR__)));
$dotenv->load();

$oDBConnector = DBConnector::connect();

/**
 *  @var \mysqli $wpdb
 */

$wpdb = $oDBConnector->oDB;
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json, charset= UTF-8");
header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Resquested-With");

$aRawUserInfo = $_POST['info'];
foreach ($aRawUserInfo as $aUserInfo) {
  $aMyUser[$aUserInfo['name']] = $aUserInfo['value'];
}
$requestMethod = $_POST['type'];
$requestAction = $_POST['action'];

$aResult = (new UserController($requestMethod, $requestAction, $aMyUser['username'], $aMyUser['password']))->userGateway();
echo $aResult;
exit;