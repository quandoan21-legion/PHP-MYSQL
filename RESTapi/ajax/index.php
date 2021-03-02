<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $isUserLoggedIn = false;
    if (isset($_SESSION['status'])) {
        if ($_SESSION['status'] == 'err') {
            echo $_SESSION['msg'];
        } else {
            echo sprintf("Hi %s", $_SESSION['user']['username']);
            $isUserLoggedIn = true;
    ?>
            <a href="logout.php">Logout</a>
        <?php
        }
    }
    if (!$isUserLoggedIn) :
        ?>
        <form id="formLogin" action="login.php" method="post">
            <h1>Login</h1>
            <label for="username">Username</label><br>
            <input type="text" id="username" name="username" placeholder="Username"><br>
            <label for="password">Password</label><br>
            <input type="password" id="password" name="password" placeholder="Password"><br>
            <button type="submit" id="submit">SignIn</button>
        </form>
    <?php endif; ?>
</body>
<script src="../../assets/js/jquery.min.js"></script>
<script>
    jQuery('#submit').on('click', function(event) {
        event.preventDefault();
        jQuery.ajax
    })
</script>

</html>