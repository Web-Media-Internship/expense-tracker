<?php 
include 'koneksi.php';

if(!empty($_POST['username']) && !empty($_POST['password']) )
{
    $username = $_POST['username'];
    $password = ($_POST['password']);
    
    $ceklogin = mysqli_query($koneksi, "SELECT * FROM users WHERE username = '$username' and password = md5('$password')");
    $cek = mysqli_fetch_array($ceklogin);
    //echo $cek; 
    if(!empty($cek[0])){
        // $rec = mysqli_fetch_array($ceklogin);
        $_SESSION['username'] = $user;
        

        header("location: ../Menu1.php");
        // header("location: login.php?msg=ok");
        
    }
    else {
        header("location:login.php?err=1;");
    }
}
?>