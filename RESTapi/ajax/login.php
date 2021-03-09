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
   $_SESSION = [
        'status' => 'success',
        'user'   => $aUser['username'],
   ];
}else {
    $_SESSION = [
        'status' => 'error',
        'msg'    => 'incorrect email or password',
    ];
}
header('location: http://localhost:8888/RESTapi/ajax/index.php');
exit;
