<?php
include '../menu_control/php_menu.php';

function query($query){
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[]=$row;
    }
    return $rows;
}

function tambah($data){
    global $koneksi;
    global $idu;
    $name = htmlspecialchars($data["name"]);
    $mtn = htmlspecialchars($data["mtn"]);
    $amn = htmlspecialchars($data["amn"]);
    $desc = htmlspecialchars($data["desc"]);
    $date = htmlspecialchars($data["date"]);

    $inq = "INSERT INTO transactions VALUES('','$idu','','','','$name','$mtn','$amn','$desc','$date','','')";
    mysqli_query($koneksi, $inq);
    return mysqli_affected_rows($koneksi);
}

function hapus($id){
    global $koneksi;

    mysqli_query($koneksi, "DELETE FROM transactions WHERE id = $id");
    return mysqli_affected_rows($koneksi);
}

function edit($data){
    global $koneksi;
    $id = $data["id"];
    $name = htmlspecialchars($data["name"]);
    $mtn = htmlspecialchars($data["mtn"]);
    $amn = htmlspecialchars($data["amn"]);
    $desc = htmlspecialchars($data["desc"]);
    $date = htmlspecialchars($data["date"]);

    $inq = "UPDATE transactions SET name = '$name',
                mutation = '$mtn',
                amount = '$amn',
                description = '$desc',
                date = '$date'
            WHERE id = '$id'";
    mysqli_query($koneksi, $inq);
    return mysqli_affected_rows($koneksi);
}
?>