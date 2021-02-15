<?php
include "src/Views/header.php";
include "src/Views/navigation.php";
?>

<div class="ui text container">
    <div class="ui link cards">
        <?php
        foreach ($_SESSION["Posts"] as $value) :
        ?>
            <div class="card">
                <div class="image">
                    <img src="<?php echo $value['3']; ?>">
                </div>
                <div class="content">
                    <div class="header">
                        <?php echo $value['1']; ?>;
                    </div>
                    <div class="description">
                        <?php echo $value['2']; ?>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>

<?php
include "src/Views/footer.php";
?>