<?php
include "src/Views/header.php";
include "src/Views/navigation.php";

?>
<div class="ui text container">
    <div class="ui link cards">
        <?php foreach ($_SESSION["results"] as $value) : ?>
            <div class="card">
                <div class="image">
                    <img src="<?php echo $value->img; ?>">
                </div>
                <div class="content">
                    <div class="header"><?php echo $value->postTitle; ?></div>
                    <div class="description">
                        <?php echo $value->postContent; ?>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>
<?php
include "src/Views/footer.php";
?>