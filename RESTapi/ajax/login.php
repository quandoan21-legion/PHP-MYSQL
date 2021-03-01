<?php
session_start();
$aUsers = json_decode(file_get_contents('users.json'), true);
$aFindedUser = array_filter($aUsers, function ($aUsers) {
    if ($aUsers['username'] == $_POST['username'] &&  $aUsers['password'] == $_POST['password']) {
        return true;
    }
    return false;
});
// var_dump($aFindedUser);die;
if (!empty($aFindedUser)) {
    $_SESSION['loggedin'] = $aFindedUser[0];
    $aResponse = ['status' => 'success', 'user' => $aFindedUser[0]];
} else {
    $aResponse = ['status' => 'err', 'msg' => 'Invalid username and password'];
}

echo json_encode($aResponse);
// header('location: http://localhost:8888/PHP-MYSQL/RESTapi/ajax/');
// exit;
