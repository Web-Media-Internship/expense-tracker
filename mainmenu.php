<?php
session_start();
if(!isset($_SESSION["login"])){
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>expense-tracker</title>
    <link rel="stylesheet" type="text/css" href="css-style//menu.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Boogaloo&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
</head>

<body>
    <nav>
        <div class="logo">
            <h1>EXPENSE TRACKER</h1>
        </div>
        <ul>
            <li><a href="">Home</a></li>
            <li><a href="">Wallets</a></li>
            <li><a href="transaction.php">Transaction</a></li>
            <li><a href="">Statement</a></li>
            <li><a href="logout.php">logout</a></li>
        </ul>
    </nav>
</body>

</html>