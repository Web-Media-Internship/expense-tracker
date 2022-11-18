<?php
include 'function.php';
$id = $_GET['id'];

if (delw2($id)>0){
    echo "<script>
    alert('wallet deleted');
    window.location = 'wallet_group.php';
    </script>";
}else{
    echo "<script>
    alert('wallet failed to delete');
    window.location = 'wallet_group.php';
    </script>";
}
?>