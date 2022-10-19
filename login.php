<?php
require 'koneksi.php';
if(isset($_POST['login'])){
    $usn = $_POST['usn'];
    $pw = $_POST['password'];

    $result = mysqli_query($koneksi,"SELECT * FROM users WHERE username = '$usn'");
        if (mysqli_num_rows($result) === 1 ) {

            $row = mysqli_fetch_assoc($result);
            if(password_verify($pw, $row["password"])){
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
    <link rel="stylesheet" type="text/css" href="css-style//login-style.css">
</head>

<body>
    <div id="login-box">
        <div class="signin-box">
        <h1>LOGIN</h1>
            <?php if(isset($error)):?>
                <p style="color: red; font style: italic;">wrong username/password</p>
            <?php endif; ?>
        <form action="" method="POST">
        <div class="register">
            <input type="text" name="usn" placeholder="username" required>
            <input type="password" name="password" placeholder="password" required>
            <div class="signup-link">
                <a href="fpass.php">forgot password?</a>
            </div>
            <input type="submit" name="login" value="SIGNIN">
            <div class="signup-link">
                <h3>don't have an account yet?<a href="register.php">SIGNUP</a><h3>
            </div>
        </div>
        </form>
    </div>
    <div class="right-b">
        <h2>WELCOME</h2>
    </div>
</body>

</html>