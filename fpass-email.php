<?php
require 'koneksi.php';
if(isset($_POST['input'])){
    $em = $_POST['email'];

$result = mysqli_query($koneksi,"SELECT * FROM users WHERE email = '$em'");
    if ($result > 1 ) {
        echo "<script>
        window.location: 'fpass.php'</script>";
    }
}
?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>forgot password</title>
    </head>
    <body>
        <h1>forgot password</h1>
        <from action="" method="post" name="from_input">
            <div class="info">
                enter new your email
            </div>
            <div class="email">
                password : <input type="email" name="email" placeholder="email" require="">
            </div>
            <div class="submit">
                <input type="submit" name="input" value="NEXT">
            </div>
        </from>
    </body>
</html>