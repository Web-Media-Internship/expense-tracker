<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>sign_up</title>
        <link rel="stylesheet" type="text/css" href="sign-up style.css"
    </head>
    <body>
        <div id="login-box">
        <h1> Sign-Up </h1>
            <div class="signup-box">
            <from action="regtest.php" method="post">
            <div class="register">
                <input type="text" name="name" placeholder="name">
                <input type="text" name="username" placeholder="username">
                <input type="text" name="email" placeholder="email">
                <input type="password" name="password" placeholder="password">
                <input type="submit" value="sign-up">
            </div>
            <div class="signup-link">
                already have an account?<a href="logintest.php">login</a>
            </div>
        </div>
        <div class="right-b">
            <h2> WELCOME </h2>
        </div>

</html>