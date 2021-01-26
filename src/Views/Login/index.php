<?php
include "src/Views/header.php";
include "src/Views/navigation.php";
echo "Contact PAGE";
?>
    <form action="" method="post">
    <div class="field">
        <input type="text" name="username"  id="">
    <br>
    </div>

    <div class="field">
        <input type="password" name="password"  id="">
    <br>
    </div>

    <div class="button">
        <button>login</button>
    </div>
    </form>
<?php
include "src/Views/footer.php";
?>