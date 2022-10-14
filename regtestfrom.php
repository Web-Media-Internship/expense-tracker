<?php
include 'koneksi.php';
    if( isset($_POST["sign-up"])){
        $name = $_POST["name"];
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $password2 = $_POST["password2"];

        $usc = mysqli_query($koneksi,"SELECT * FROM users WHERE username = '$username'");
        $logincek = mysqli_num_rows($usc);
        if ($cek_login > 0) {
            echo "<script>
            alert('username has been add');
            window.location = 'regtestfrom.php';
            <script>";
        }else{
            if ($password != $password2) {
                echo "<script>
                alert('ceck your confirm password');
                window.location = 'regtestfrom.php';
                </script>";
            }else{
                mysqli_query($koneksi,"INSERT INTO users VAlUES('', '$name', '$username', '$email', '$password', '', '')");
                echo "<script>
                alert('successful');
                window.location = 'logintest.php';
                </script>";
            }
        }
    }
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>sign_up</title>
        <link rel="stylesheet" type="text/css" href="css//sign-up style.css"
    </head>
    <body>
        <div id="login-box">
        <h1> Sign-Up </h1>
            <div class="signup-box">
            <from action="" method="post">
            <div class="register">
                <input type="text" name="name" placeholder="name">
                <input type="text" name="username" placeholder="username">
                <input type="text" name="email" placeholder="email">
                <input type="password" name="password" placeholder="password">
                <input type="password" name="password2" placeholder="confirm password">
                <input type="submit" name="sign-up" value="sign-up">
            </div>
            <div class="signup-link">
                already have an account?<a href="logintest.php">login</a>
            </div>
        </div>
        <div class="right-b">
            <h2> WELCOME </h2>
        </div>
    </body>
</html>