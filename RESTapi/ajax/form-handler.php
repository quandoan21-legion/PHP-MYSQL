<?php
session_start();
if ($_POST['action'] == "login") {      

    $aUsers = json_decode(file_get_contents('users.json'), true);

    $aRawUser = $_POST['info'];
    
    foreach ($aRawUser as $aUserInfo) {
        $aMyUser[$aUserInfo['name']] = $aUserInfo['value']; 
    }
    $aFindedUser = array_filter($aUsers, function(array $aUsers) use ($aMyUser) {
        if ($aUsers['username'] == $aMyUser['username'] && $aUsers['password'] == $aMyUser['password']) {
            return true;
        }
        return false;
    });
    if (!empty($aFindedUser)) { 
        
        $_SESSION['loggedIn'] = $aFindedUser[0];

        $aResponse = [
            'status' => 'success', 
            'user'   => $aFindedUser[0]
        ];
    } else {
        $aResponse = [
            'status' => 'error', 
            'msg'    => 'Invalid username and password'
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
// header('location: http://localhost:8888/RESTapi/ajax/index.php');
// exit;
