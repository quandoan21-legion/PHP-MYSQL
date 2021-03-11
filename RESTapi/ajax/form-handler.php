<?php
session_start();
if ($_POST['action'] == 'login') {
    $aUsers = json_decode(file_get_contents('users.json'), true);
    
    $aRawMyUser =$_POST['info'];

    foreach ($aRawMyUser as $aUserInfo) {
        $aMyUser[$aUserInfo['name']] = $aUserInfo['value'];
    }

    $aFindedUser = array_filter($aUsers, function ($aUser) use ($aMyUser) {
        if ($aUser['username'] == $aMyUser['username'] && $aUser['password'] == $aMyUser['password']) {
            return true;
        }
        return false;
    });

    if (!empty($aFindedUser)) {
        $_SESSION['loggedIn'] = $aFindedUser[0];
        $aResponse = ['status' => 'success', 'user' => $aFindedUser[0]];
    } else {
        $aResponse = ['status' => 'error', 'msg' => 'Invalid username and password'];
    }
    echo json_encode($aResponse);
} else {
    session_destroy();
    echo json_encode(['status' => 'success', 'msg' => 'you have logged out successfully']);
}

