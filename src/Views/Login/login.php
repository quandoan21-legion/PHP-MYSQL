<?php
include "src/Views/header.php";
include "src/Views/navigation.php";
?>
<div class="ui text container">
    <form class="ui form" method="POST" action="handleLogin">
        <div class="field">
            <label>Username</label>
            <input type="text" name="userName" placeholder="Username">
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