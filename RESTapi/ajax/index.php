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
    <h1>Login</h1>
    <?php
    $isUserLoggedIn = false;
    if (isset($_SESSION['status'])) {
        if ($_SESSION['status'] = 'error') {
            echo $_SESSION['msg'];
        } else {
            echo sprintf("Hi $s, Welcome back!", $_SESSION['user']['username']);
            $isUserLoggedIn = true;
            ?>
        <a href="logout"></a>
    <?php
        }
    }
    if (!$isUserLoggedIn) :
    ?>
        <form action="login.php" method="post">
            <P>
                <label for="username">Username</label> <br>
                <input type="text" name="username" id="username" placeholder="Username"> <br>
            </P>
            <p>
                <label for="password">Password</label> <br>
                <input type="password" name="password" id="password" placeholder="Password"> <br>
            </p>
            <button type="submit">Login</button>
        </form>
    <?php endif; ?>
</body>

</html>