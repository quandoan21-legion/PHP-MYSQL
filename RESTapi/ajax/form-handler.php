<?php
session_start();

header('HTTP/1.1 200 OK');
header('Content-Type: application/json');    

if ($_POST['action'] == 'login') {
    $aUsers = json_decode(file_get_contents('users.json'), true);

    $aRawUserInfo = $_POST['info'];

    foreach ($aRawUserInfo as $aUserInfo) {
        $aMyUser[$aUserInfo['name']] = $aUserInfo['value'];
    }
    $aFindedUser = array_filter($aUsers, function (array $aUsers) use ($aMyUser) {
        if ($aUsers['username'] == $aMyUser['username'] && $aUsers['password'] == $aMyUser['password']) {
            return true;
        }
        return false;
    });

    if ($aFindedUser) {
        $aResponse = [

            'status' => 'success',
            'user'   => $aFindedUser[0],

        ];
    } else {

        $aResponse = [

            'status' => 'error',
            'msg'    => 'Invalid username or password',

        ];
    }
    echo json_encode($aResponse);
} else {
    session_destroy();
    $aResponse = [
        'status' => 'success',
        'msg'    => 'you have logout successfully'
    ];
    echo json_encode($aResponse);
}


exit;