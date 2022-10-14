<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>login</title>
        <link rel="stylesheet" type="text/css" href="css//login-style.css">
    </head>
    <body>
        <div id="login-box">
        <h1>login</h1>
            <div class="signin-box">
            <from action="login.php" method="post">
                username : <input type="text" name="username" placeholder="username" require="">
                password : <input type="password" name="password" placeholder="password" require="">
            <div class="link">
                <div class="pass-link">
                    <a href="fpass.php">forgot password?</a>
                </div>
            </div>
            <div class="submit">
                <input type="submit" name="input" value="login">
            </div>
            <div class="signup-link">
                don't have an account yet?<a href="regtestfrom.php">sign up now</a>
            </div>
        </div>
            <div class="right-b">
                <h2>WELCOME<h2>
            </div>
        </div>
    </body>
</html>
