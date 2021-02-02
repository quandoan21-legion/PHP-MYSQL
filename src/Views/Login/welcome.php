<?php
include "src/Views/header.php";
include "src/Views/navigation.php";
include "src/Views/messages.php";
?>

<div class="ui text container">
    <?php
    echo "welcome " . $_SESSION['username'];
    ?>
</div>

<?php
include "src/Views/footer.php";
?>