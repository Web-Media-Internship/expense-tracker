<?php
    
    $host = "localhost";
    $user = "root";
    $pw = "";
    $db = "expensetracker";

    $koneksi = mysqli_connect($host, $user, $pw, $db);
    if(!$koneksi){
        echo "gagal terhubung";
    }