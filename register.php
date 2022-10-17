<?php
include 'koneksi.php';
if(isset($_POST['register'])){
    if(registrasi($_POST) > 0) {
        echo "<script>
        alert('successful');
        window.location= 'login.php';
        </script>";
    } else {
        echo mysqli_error($koneksi);
    }

    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="css-style//regfrom-style.css">
</head>

<body>
    <div id="login-box">
        <div class="signup-box">
        <h1>REGISTER</h1>
        <form action="" method="POST">
        <div class="register">
            <input type="text" name="name" placeholder="name" require="">
            <input type="text" name="usn" placeholder="username" require="">
            <input type="email" name="email" placeholder="email" require="">
            <input type="password" name="pw" placeholder="password" require="">
            <input type="password" name="pw2" placeholder="confirm password" require="">
            <input type="submit" name="register" value="SIGNUP" require="">
        </div>
        <div class="signup-link">
            already have an account?<a href="login.php">login</a>
        </div>
        </form>
    </div>
    <div class="right-b">
        <h2>WELCOME</h2>
    </div>
</body>

</html>