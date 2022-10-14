<?

    include "koneksi.php";

    $name=$_POST["name"];
    $username=$_POST["username"];
    $email=$_POST["email"];
    $password=$_POST["password"];

    $sqlr="insert into users (name, username, email, password) values ('$name', 'username', 'email', 'password')";

    $regtest=mysqli_query($koneksi,$sqlr);

    if ($regtest) {
        echo "sign-up successful";
    }else{
        echo "sign-up failed";
    }

?>