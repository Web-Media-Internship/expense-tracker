<?php
include 'function.php';
$id = $_GET['id'];

if (delwl($id)>0){
    echo "<script>
    alert('wallet group deleted');
    window.location = 'wallet_group.php';
    </script>";
    
}else{
    echo "<script>
    alert('wallet group failed to delete');
    window.location = 'wallet_group.php';
    </script>";
}
?>