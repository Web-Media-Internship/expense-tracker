<?php
require 'koneksi.php';
if(isset($_POST['login'])){
    $usn = $_POST['usn'];
    $password = $_POST['password'];

    $result = mysqli_query($koneksi,"SELECT * FROM users WHERE username = '$usn'");
        if (mysqli_num_rows($result) === 1 ) {

            $row = mysqli_fetch_assoc($result);
            if(password_verify($password, $row["password"])){
                header("location: mainmenu.php");
                exit;
            }
        }
        $error = true;
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="css-style//signup-style.css">
</head>

<body>
    <div id="login-box">
        <h1>Login</h1>
        <div class="signup-box">
            <?php if(isset($error)):?>
                <p style="color: red; font style: italic;">wrong username/password</p>
            <?php endif; ?>
        <form action="" method="POST">
        <div class="register">
            <input type="text" name="usn" placeholder="username">
            <input type="password" name="password" placeholder="password">
            <div class="signup-link">
                <a href="logintest.php">forgot password?</a>
            </div>
            <input type="submit" name="login" value="SIGNIN">
            <div class="signup-link">
                don't have an account yet?<a href="register.php">SIGNUP</a>
            </div>
        </div>
        </form>
    </div>
    <div class="right-b">
        <h2>WELCOME</h2>
    </div>
</body>

</html>