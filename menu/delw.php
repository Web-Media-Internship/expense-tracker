<?php
include 'function.php';
$id = $_GET['id'];

if (delw($id)>0){
    echo "<script>
    alert('wallet group and its contents have been deleted');
    window.location = 'wallet_group.php';
    </script>";
    
}else{
    echo "<script>
    alert('wallet group delete');
    window.location = 'wallet_group.php';
    </script>";
}
?>