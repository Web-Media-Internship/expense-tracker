<?php 
include 'function.php';
if(isset($_POST['add'])){
    if(tamwg($_POST) > 0){
        echo "<script>
        alert('Wallet group added successfully');
        window.location = 'wallet_group.php';
        </script>";
    } else {
        echo "<script>
        alert('failed Wallet group added');
        </script>";
    }
}
?>
<?php include '../menu_control/head_menu.php'; ?>
<body>
    <nav>
        <div class="logo">
            <h1>NEW WALLET GROUP</h1>
        </div>
        <ul>
            <li><a href="wallet.php">back</a></li>
        </ul>
    </nav>
    <form action="" method="POST">
    <input type="hidden" name="id" value="<?=$iwg?>">
        <div class="register">
            <ul>
                <li>Name<div><input type="text" name="name" placeholder="name" required></li>
                <li><input type="submit" name="add" value="add"></li>
            </ul>
        </div>
    </form>