<?php 
include 'function.php';

?>
<?php include '../menu_control/head_menu.php'; ?>
<body>
    <nav>
        <div class="logo">
            <h1>NEW wallet</h1>
        </div>
        <ul>
            <li><a href="wallet.php">back</a></li>
        </ul>
    </nav>
    <form action="" method="POST">
    <input type="hidden" name="name" value="<?=$_GET['id'];?>">
        <div class="register">
            <ul>
                <li>Name<div><input type="text" name="name" placeholder="name" required></li>
                <li>Description<div><input type="text" name="desc" placeholder="description" required></li>
                <li><input type="submit" name="add" value="add"></li>
            </ul>
        </div>
    </form>