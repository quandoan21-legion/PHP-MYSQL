<?php session_start(); ?>
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
    $userLoggedIn = false;
    if (isset($_SESSION['status'])) {
        if ($_SESSION['status'] == 'success') {
            echo "logged in successfully";
            $userLoggedIn = true; ?>
            <a href="logout.php">LogOut</a>
    <?php
        } else {
            echo $_SESSION['msg'];
        }
    }
    ?>
    <?php if (!$userLoggedIn) : ?>
        <h1>Login</h1>
        <form action="login.php" id="formLogin" method="post">
            <p>
                <label for="username">Username</label> <br>
                <input type="text" name="username" id="username" placeholder="Username"> <br>
            </p>

            <p>
                <label for="password">Password</label> <br>
                <input type="password" name="password" id="password" placeholder="Password"> <br>
            </p>

            <button type="submit" id="submit">LogIn</button>
        </form>
    <?php endif; ?>
    <script src="../../assets/js/jquery-3.1.1.min.js"></script>
    <script>
        jQuery('#submit').on('click', function(event) {
            event.preventDefault();
            console.log(response.status);
            jQuery.ajax({
                type: 'POST',
                url: 'login.php',
                data: jQuery('#formLogin').serializeArray(),
                success: function (response) {
                    const oResponse = JSON.parse(response);
                    console.log(oResponse);
                }
            })
        })
    </script>
</body>

</html>