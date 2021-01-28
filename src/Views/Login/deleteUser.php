<?php
include "src/Views/header.php";
include "src/Views/navigation.php";
echo "GET DELETE USER INFORMATION PAGE" . '<br>';

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
    ->delete();
?>
<?php
include "src/Views/footer.php";
?>