<?php
$aNav = include("configs/navigation.php");
if (isset($_SESSION['id']) !== true) {
    $aNavVal = $aNav['non-users'];
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
    foreach ($aNavRoute as $value) :
        $name = array_search($value, $aNavVal);
    ?>
        <div class="header item">
            <a href="<?php echo $value ?>">
                <?php echo $aNavVal[$value];  ?>
            </a>
        </div>
    <?php endforeach ?>
    <?php var_export(isset($_SESSION['id'])); ?>
</div>