<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AJAX</title>
    <style>
        .hidden {
            display: none;
        }
    </style>

<body>
    <?php if (!$userLoggedIn) : ?>
        <div id="msg"></div>
        <div id="loggedIn"></div>
        <a id="logout" class="<?php echo $userLoggedIn ? "" : "hidden" ?>" href="logout.php">logout</a>
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
        $msg = jQuery("#msg");
        $formLogin = jQuery("#formLogin");
        $loggedIn = jQuery("#loggedIn");
        $logout = jQuery("#logout");
        let oResponse = {};
        jQuery("#formLogin").on("submit", function(event) {
            event.preventDefault();
            $msg.html("");
            jQuery.ajax({
                type: "POST",
                url: "form-handler.php",
                data: {
                    info: jQuery("#formLogin").serializeArray(),
                    action: 'logout'
                },
                success: function(response) {
                    oResponse = JSON.parse(response);
                    if (oResponse.status === "error") {
                        $msg.html(oResponse.msg)
                    } else {
                        $loggedIn.html(`Hi ${oResponse.user.username}, welcome back!`),
                            $formLogin.remove()
                        $logout.removeClass('hidden')
                    }
                }
            })
        })
        $logout.on("click", function(event) {
            event.preventDefault();
            jQuery.ajax({
                type: "POST",
                url: "form-handler.php",
                data: {
                    action: 'logout'
                },
                success: function(response) {
                    oResponse = JSON.parse(response);
                    if (oResponse.status === 'success') {
                        window.reload();
                    } else {
                        alert(oResponse.msg);
                    }
                }
            })
        })
    </script>
</body>

</html>