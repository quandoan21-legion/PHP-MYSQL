<?php
include "src/Views/header.php";
include "src/Views/navigation.php";
?>

<div class="ui text container">
    <?php
    echo "welcome " . $_SESSION['userName'];
    ?>
</div>

<?php
include "src/Views/footer.php";
?>