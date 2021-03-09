<?php 
session_start();
$aUsers = json_decode(file_get_contents("users.json"), true);

$aFindedUser = array_filter($aUsers, function($aUsers){
    if ($aUsers['username'] == $_POST['username'] && $aUsers['password'] == $_POST['password']) {
        return true;
    }else {
        return false;
    }
});

if (!empty($aFindedUser)) {
    $_SESSION = [
        'status' => 'success',
        'user' => $aFindedUser[0]['username'],
    ];
} else {
    $_SESSION = [
        'status' => 'success',
        'msg' => 'Invalid username or password',
    ];
}
header('Location: localhost:8888/RESTapi/ajax/index.php');
exit;   