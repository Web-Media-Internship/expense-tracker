<?php 
include 'function.php';
if(isset($_POST['add'])){
    if(tambah($_POST) > 0){
        echo "<script>
        alert('Transaction added successfully');
        window.location = 'transaction.php';
        </script>";
    } else {
        echo "<script>
        alert('failed Transaction added');
        </script>";
    }
}
?>
<?php include '../menu_control/head_menu.php'; ?>
<body>
    <nav>
        <div class="logo">
            <h1>NEW TRANSACTION</h1>
        </div>
        <ul>
            <li><a href="transaction.php">back</a></li>
        </ul>
    </nav>
    <form action="" method="POST">
        <div class="register">
            <ul>
                <li>Name<div><input type="text" name="name" placeholder="name" required></li>
                <li>Mutation<div><input type="text" name="mtn" placeholder="mutation" required></li>
                <li>Amount<div><input type="text" name="amn" placeholder="amount" required></li>
                <li>Description<div><input type="text" name="desc" placeholder="description" required></li>
                <li>Date<div><input type="text" name="date" placeholder="date" required value="0000-00-00 00:00:00"></li>
                <li><input type="submit" name="add" value="add"></li>
            </ul>
        </div>
    </form>