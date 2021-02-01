<?php
include "src/Views/header.php";
include "src/Views/navigation.php";
?>
<div class="ui text container">
    <form class="ui form" method="POST" action="">
        <div class="field">
            <label>Username</label>
            <input type="text" name="userName" placeholder="Username">
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