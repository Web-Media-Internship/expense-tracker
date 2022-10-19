<?php
    
    $host = "localhost";
    $user = "root";
    $pw = "";
    $db = "expensetracker";

    $koneksi = mysqli_connect($host, $user, $pw, $db);
    if(!$koneksi){
        echo "gagal terhubung";
    }
    
    function registrasi($data) {
        global $koneksi;
        $name = $data["name"];
        $username = strtolower(stripslashes($data["usn"]));
        $email = $data["email"];
        $password = mysqli_real_escape_string($koneksi, $data["pw"]);
        $password2 = mysqli_real_escape_string($koneksi, $data["pw2"]);

        $usc = mysqli_query($koneksi, "SELECT * FROM users WHERE username = '$username'");
            if(mysqli_fetch_assoc($usc)){
                echo "<script>
                    alert('username has been add');
                </script>";
                return false;
            }
        $em = mysqli_query($koneksi, "SELECT * FROM users WHERE email = '$email'");
        if(mysqli_fetch_assoc($em)){
            echo "<script>
                alert('email already used');
            </script>";
            return false;
        }

        if ($password != $password2) {
            echo "<script>
                alert('ceck your confirm password');
                </script>";
            return false;
        }

        $password = password_hash($password, PASSWORD_DEFAULT);

        mysqli_query($koneksi, "INSERT INTO users VALUES('', '$name', '$username', '$email', '$password', '', '')");

        return mysqli_affected_rows($koneksi);
    }
?>