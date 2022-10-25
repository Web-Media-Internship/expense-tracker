<?php
include 'function.php';
$id = $_GET['id'];

if (hapus($id)>0){
    echo "<script>
    alert('transaction deleted');
    window.location = 'transaction.php';
    </script>";
    
}else{
    echo "<script>
    alert('transaction failed to delete');
    window.location = 'transaction.php';
    </script>";
}
?>