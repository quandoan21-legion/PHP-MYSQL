<?php 
session_start();
session_destroy();
header('location: http://localhost:8888/RESTapi/ajax/index.php');
exit;