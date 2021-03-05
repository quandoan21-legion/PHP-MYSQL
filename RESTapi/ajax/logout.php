<?php
session_start();
session_destroy();
header('location: http://localhost:8888/PHP-MYSQL/RESTapi/ajax/');
exit;
