<?php
include "src/Views/header.php";
include "src/Views/navigation.php";
?>
<div class="ui text container">
    <?php
    include "src/Views/messages.php";
    ?>
    <form class="ui form" method="POST" action="handleRegister">
        <div class="field">
            <label>username</label>
            <input type="text" name="username" placeholder="username">
        </div>
        <div class="field">
            <label>Email</label>
            <input type="email" name="email" placeholder="Email">
        </div>
        <div class="field">
            <label>Password</label>
            <input type="password" name="password" placeholder="Password">
        </div>
        <div class="field">
            <label>Address</label>
            <input type="text" name="address" placeholder="Address">
        </div>
        <button class="ui button" type="submit">Register</button>
    </form>
</div>
<?php
include "src/Views/footer.php";
?>