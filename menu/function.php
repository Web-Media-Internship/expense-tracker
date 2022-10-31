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
// transaction
function tambah($data){
    global $koneksi;
    global $idu;
    $wlt = htmlspecialchars($data["wlt"]);
    $name = htmlspecialchars($data["name"]);
    $mtn = htmlspecialchars($data["id"]);
    $amn = htmlspecialchars($data["amn"]);
    $desc = htmlspecialchars($data["desc"]);
    $date = htmlspecialchars($data["date"]);

    $inq = "INSERT INTO transactions VALUES('','$idu','','$wlt','','$name','$mtn','$amn','$desc','$date','','')";
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
    $wlt = htmlspecialchars($data["wlt"]);
    $name = htmlspecialchars($data["name"]);
    $mtn = htmlspecialchars($data["mt"]);
    $amn = htmlspecialchars($data["amn"]);
    $desc = htmlspecialchars($data["desc"]);
    $date = htmlspecialchars($data["date"]);

    $inq = "UPDATE transactions SET wallets_id = '$wlt',
                name = '$name',
                mutation = '$mtn',
                amount = '$amn',
                description = '$desc',
                date = '$date'
            WHERE id = '$id'";
    mysqli_query($koneksi, $inq);
    return mysqli_affected_rows($koneksi);
}

// wallet group

function tamwg($data){
    global $koneksi;
    global $idu;
    $name = htmlspecialchars($data["name"]);

    $inq = "INSERT INTO wallet_groups VALUES('','$idu','$name','0','','')";
    mysqli_query($koneksi, $inq);
    return mysqli_affected_rows($koneksi);
}

function delw($id){
    global $koneksi;

    mysqli_query($koneksi, "DELETE FROM wallet_groups,wallets WHERE wallet_groups.id = $id, 
    wallets.wallet_groups_id = $id");
    return mysqli_affected_rows($koneksi);
}


//wallet



function tamwl($data){
    global $koneksi;
    $id = $data["id"];
    $name = htmlspecialchars($data["name"]);
    $desc = htmlspecialchars($data["desc"]);

    $inq = "INSERT INTO wallets VALUES('','$id','$name','$desc','','','')";
    mysqli_query($koneksi, $inq);
    return mysqli_affected_rows($koneksi);
}
function delw2($id){
    global $koneksi;

    mysqli_query($koneksi, "DELETE FROM wallets WHERE id = $id");
    return mysqli_affected_rows($koneksi);
}

?>