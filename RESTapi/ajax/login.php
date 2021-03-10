<?php
session_start();
$aUsers = json_decode(file_get_contents('users.json'), true);

$aFindedUser = array_filter($aUsers, function($aUser){
    if ($aUser['username'] == $_POST['username'] && $aUser['password'] == $_POST['password']) {
        return true;
    }
    return false;
});

if (!empty($aFindedUser)) {
    $_SESSION['loggedin'] = $aFindedUser[0];
    $aResponse = ['status' => 'success', 'user' => $aFindedUser[0]['username']];
} else {
    $aResponse = ['status' => 'error', 'msg' => 'Invalid username and password'];
}
echo json_encode($aResponse);
// header('location: http://localhost:8888/RESTapi/ajax/index.php');
// exit;
