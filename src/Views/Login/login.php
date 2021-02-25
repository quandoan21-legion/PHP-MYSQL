<?php
include "src/Views/header.php";
include "src/Views/navigation.php";
?>
<div class="ui text container">
    <?php
    include "src/Views/messages.php";
    ?>
    <form class="ui form" method="POST" action="handleLogin">
        <div class="field">
            <label>Username</label>
            <input type="text" name="usernameOrEmail" placeholder="Username Or Email">
        </div>
        <div class="field">
            <label>Password</label>
            <input type="password" name="password" placeholder="Password">
        </div>
        <button class="ui button" type="submit">Login</button>
    </form>
</div>
<?php
include "src/Views/footer.php";
?>

