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
    <?php if (!$userLoggedIn) : ?>
        <div id="msg"></div>
        <div id="loggedIn"></div>

        <form action="login.php" id="formLogin" method="post">
            <h1>Login</h1>
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
        const $msg = jQuery("#msg");
        const $form = jQuery("#formLogin");
        $form.on('submit', function(event) {
            event.preventDefault();

            $msg.html("");
            jQuery.ajax({
                type: 'POST',
                url: 'login.php',
                data: jQuery('#formLogin').serializeArray(),
                success: function(response) {

                    const oResponse = JSON.parse(response);

                    if (oResponse.status === "error") {
                        $msg.html(oResponse.msg);
                    } else {
                        jQuery("#loggedIn").html(`Hello, ${oResponse.user.username} ! <a href="logout.php">LogOut</a>`);
                        $form.remove();
                    }
                }
            })
        })
    </script>
</body>

</html>