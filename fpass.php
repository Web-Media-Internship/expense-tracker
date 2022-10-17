<?php
require 'koneksi.php';
if(isset($_POST['login'])){
    $em = $_POST['em'];
    $pw = $_POST['pw'];
    $pw2 = $_POST['pw2'];

    $result = mysqli_query($koneksi,"SELECT * FROM users WHERE email = '$em'");
        if (mysqli_num_rows($result) === 1 ) {
            if ($pw != $pw2) {
                echo "<script>
                alert('ceck your confirm password');
                window.location = 'fpass.php';
                </script>";
            }else{
                $pw = password_hash($pw, PASSWORD_DEFAULT);
                mysqli_query($koneksi,"UPDATE users SET password='$pw' WHERE email='$em'");
                echo "<script>
                alert('successful');
                window.location = 'login.php';
                </script>";
            }
        }
        $error = true;
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="css-style//fpass-style.css">
</head>

<body>
    <div id="login-box">
        <div class="fpass-box">
        <h1>forgot password</h1>
            <?php if(isset($error)):?>
                <p style="color: red; font style: italic;">email not registered</p>
            <?php endif; ?>
        <form action="" method="POST">
        <div class="register">
            <div>
                <input type="email" name="em" placeholder="email">
            </div>
            <div>
                <input type="password" name="pw" placeholder="password">
            </div>
            <div>
                <input type="password" name="pw2" placeholder="confirm password">
            </div>
            <div>
                <input type="submit" name="login" value="SIGNIN">
            </div>
            <div class="signup-link">
                back to login?<a href="login.php">LOGIN</a>
            </div>
        </div>
        </form>
    </div>
</body>

</html>