<?php 
include 'function.php';

$idt = $_GET['id'];

$edt = query("SELECT * FROM wallets WHERE wid = $idt")[0];


if(isset($_POST['ed'])){
    if(edwl($_POST) > 0){
        echo "<script>
        alert('Wallet edited');
        window.location = 'wallet_group.php';
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
            <h1>EDIT WALLET</h1>
        </div>
        <ul>
            <li><a href="">back</a></li>
        </ul>
    </nav>
    <form action="" method="POST">
        <div class="register">
            <input type="hidden" name="id" value="<?=$edt["wid"];?>">
            <ul>
                <li>Name<div><input type="text" name="name" placeholder="name" required value="<?=$edt["wl_name"];?>"></li>
                <li>Description<div><input type="text" name="desc" placeholder="description" required value="<?=$edt["wdesc"];?>"></li>
                <li><input type="submit" name="ed" value="edit"></li>
            </ul>
        </div>
    </form>