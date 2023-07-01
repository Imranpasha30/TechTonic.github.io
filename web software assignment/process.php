<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>login page</title>
    <style>
        #message {
            position: relative;
            z-index: 9999;
        }
    </style>
    <script>
        window.onload = function() {
            var message = "<?php echo $msg; ?>";
            if (message !== '') {
                var msgContainer = document.getElementById("message");
                msgContainer.innerHTML = message;
                msgContainer.style.backgroundColor = "green";
                msgContainer.style.color = "white";
            }
        }
    </script>
</head>
<body>
    <div class="contain">
        <span class="border-line"></span>
        <form action="process.php" method="POST">
            <h2>SIGN-IN</h2>
            <div class="input">
                <input type="email" id="email" name="email" required="required">
                <span>Email-id</span>
                <i></i>
            </div>
            <div class="input">
                <input type="password" id="password" name="password" required="required">
                <span>password</span>
                <i></i>
            </div>
            <div class="links">
                <a href="#">forgot password</a>
                <a href="registorform.php">Sign up</a>
            </div>
            <input type="submit" name='submit' value="Submit">
        </form>
        <div id="message"></div> <!-- New message container -->
    </div>
</body>
</html>
