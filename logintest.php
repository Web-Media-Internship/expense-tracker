<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>login</title>
        <link rel="stylesheet" type="text/css" href="login style.css">
    </head>
    <body>
        <h1>login</h1>
        <div class="from">
            <from action="login.php" method="post" name="from_input">
                <div class="username">
                    username : <input type="text" name="username" placeholder="username" require="">
                </div>
                <div class="password">
                    password : <input type="password" name="password" placeholder="password" require="">
                </div>
                <div class="link">
                    <div class="pass-link">
                        <a href="#">forgot password?</a>
                    </div>
                </div>
                <div class="submit">
                    <input type="submit" name="input" value="login">
                </div>
                <div class="signup-link">
                    don't have an account yet?<a href="regtestfrom.php">sign up now</a>
                </div>
            </from>
        </div>
    </body>
</html>
