<?php
include "src/Views/header.php";
include "src/Views/navigation.php";
echo "GET UPDATE USER INFORMATION PAGE" . '<br>';

?>

<?php
$oUpdateUser = Basic\Database\MySqlConnect::connect()
    ->table('users')
    ->where($aWhere = [
        'userName' => 'quandoan21'
    ])
    ->orWhere($aOrWhere = [
        'userName' => 'sadwdsadw'
    ])
    ->set($aSet = [
        'email' => 'quandoan21@gmail.com',
        'password' => 'quandoan21@gmail.com'
    ])
    ->update();
?>
<?php
include "src/Views/footer.php";
?>