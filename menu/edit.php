<?php 
include 'function.php';

$idt = $_GET['id'];

$edt = query("SELECT * FROM transactions WHERE id = $idt")[0];



if(isset($_POST['ed'])){
    if(edit($_POST) > 0){
        echo "<script>
        alert('Transaction edited');
        window.location = 'transaction.php';
        </script>";
    } else {
        echo "<script>
        alert('failed to change');
        </script>";
    }
}
?>
<?php include '../menu_control/head_menu.php'; ?>
<body>
    <nav>
        <div class="logo">
            <h1>EDIT TRANSACTION</h1>
        </div>
        <ul>
            <li><a href="transaction.php">back</a></li>
        </ul>
    </nav>
    <form action="" method="POST">
        <div class="register">
            <input type="hidden" name="id" value="<?=$edt["id"];?>">
            <ul>
                <li>Name<div><input type="text" name="name" placeholder="name" required value="<?=$edt["name"];?>"></li>
                <li>Mutation<div><input type="text" name="mtn" placeholder="mutation" required value="<?=$edt["mutation"];?>"></li>
                <li>Amount<div><input type="text" name="amn" placeholder="amount" required value="<?=$edt["amount"];?>"></li>
                <li>Description<div><input type="text" name="desc" placeholder="description" value="<?=$edt["description"];?>"></li>
                <li>Date <div><input type="text" name="date" placeholder="date" value="<?=$edt["date"];?>"></li>
                <li><input type="submit" name="ed" value="edit"></li>
            </ul>
        </div>
    </form>