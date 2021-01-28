<?php
include "src/Views/header.php";
include "src/Views/navigation.php";
echo "INSERT USER PAGE" .'<br>';

?>

<?php
$oSetUser = Basic\Database\MySqlConnect::connect()
    ->table('users')
    ->values($aValues = [
        'userName' => 'qsdasduandoan21',
        'email' => 'qdoian2442sdhjagdjagshd@gmail.com',
        'password' => '12344',
        'address' => '12344'
    ])
    ->insert();
// return $oGetUser;
$oGetUser = Basic\Database\MySqlConnect::connect()
    ->table('users')
    ->where($aWhere = [
        // 'password' => '123',
        'userName' => 'qsdasduandoan21'
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