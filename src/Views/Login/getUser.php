<?php
include "src/Views/header.php";
include "src/Views/navigation.php";
echo "GET USER INFORMATION PAGE" . '<br>';

?>

<?php
$oGetUser = Basic\Database\MySqlConnect::connect()
    ->table('users')
    ->buildWhereQuery($aWhere = [
        'userName' => 'qsdasduandoan21',
        'email' => 'qdoan21@gmail.com'
    ])
    ->buildWhereQuery($aOrWhere = [
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

<button class="ui button">
    Follow
</button>
<?php
include "src/Views/footer.php";
?>