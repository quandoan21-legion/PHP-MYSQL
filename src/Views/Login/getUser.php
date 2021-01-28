<?php
include "src/Views/header.php";
include "src/Views/navigation.php";
echo "GET USER INFORMATION PAGE" . '<br>';

?>

<?php
$oGetUser = Basic\Database\MySqlConnect::connect()
    ->table('users')
    ->where($aWhere = [
        // 'password' => '123',
        'userName' => 'quandoan21'
    ])
    ->orWhere($aOrWhere = [
        'userName' => 'sadwdsadw'
    ])
    ->select();
// return $oGetUser;
while ($aResult = $oGetUser->fetch_assoc()) {
    echo "<br> id:" . $aResult['ID'] .
        "<br> username:" . $aResult['userName'] .
        "<br> password:" . $aResult['password'] . 
        "<br> address:" . $aResult['address'] . "<br>";
}
?>
<?php
include "src/Views/footer.php";
?>