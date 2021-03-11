<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .hidden {
            display: none;
        }
    </style>

<body>
    <div id="msg"></div>
    <div id="logedIn"></div>
    <a id="logout" class="<?php echo $userLoggedIn ? "" : "hidden"; ?>" href="logout.php">logout</a>
    <?php if (!$userLoggedIn) : ?>
        <form action="form-handler.php" id="formLogin" method="post">
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
        $logedIn = jQuery("#logedIn");
        $logout = jQuery("#logout");

        $formLogin.on("submit", function(event) {
            event.preventDefault();
            $msg.html("");
            jQuery.ajax({
                type: "POST",
                url: "form-handler.php",
                data: {
                    info: jQuery("#formLogin").serializeArray(),
                    action: 'login'

                },
                success: function(response) {
                    let oResponse = JSON.parse(response);
                    if (oResponse.status === "error") {
                        $msg.html(oResponse.msg)
                    } else {
                        $logedIn.html(`Hi ${oResponse.user.username}, welcome back!`),
                            $logout.removeClass('hidden'),
                            $formLogin.remove()
                    }
                }
            })
        })
        $logout.on("click", function(event) {
            event.preventDefault();
            $msg.html("");
            jQuery.ajax({
                type: "POST",
                url: "form-handler.php",
                data: {
                    action: 'logout'
                },
                success: function(response) {
                    let oResponse = JSON.parse(response);
                    if (oResponse.status === 'success') {
                        $msg.html(oResponse.msg),
                            window.location.reload()
                    } else {
                        alert(oResponse.msg);
                    }
                }
            })

        })
    </script>
</body>

</html>