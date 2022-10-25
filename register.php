<?php
include 'function.php';
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
            <input type="text" name="name" placeholder="name" required>
            <input type="text" name="usn" placeholder="username" required>
            <input type="email" name="email" placeholder="email" required>
            <input type="password" name="pw" placeholder="password" required>
            <input type="password" name="pw2" placeholder="confirm password" required>
            <input type="submit" name="register" value="SIGNUP">
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