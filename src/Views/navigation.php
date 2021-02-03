<?php
$aNav = include("configs/navigation.php");
if (!isset($_SESSION['id'])) {
    $aNavVal = $aNav['non-users'];
    // $aNavRoute = array_search();
} else {
    $aNavVal = $aNav['users'];
}
$aNavRoute = array_keys($aNavVal);
?>
<div class="ui menu">
    <div class="header item">
        PAGE
    </div>

    <?php 
    echo "<pre>";
    var_export(isset($_SESSION['id']));
    echo "</pre>";

    foreach ($aNavRoute as $value) :
        $name = array_search($value, $aNavVal);
    ?>
        <div class="header item">
            <a href="<?php echo $value ?>">
                <?php echo $aNavVal[$value];  ?>
            </a>
        </div>
    <?php endforeach ?>
</div>