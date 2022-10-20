<?php
include 'koneksi.php';
session_start();

$qtb = mysqli_query($koneksi, "SELECT code,transactions_name,mutation,amount,date,description FROM transactions");

if(!isset($_SESSION["login"])){
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>expense-tracker</title>
    <link rel="stylesheet" type="text/css" href="css-style//transaction.css">
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
            <li><a href="">Transaction</a></li>
            <li><a href="">Statement</a></li>
            <li><a href="logout.php">logout</a></li>
        </ul>
    </nav>
    <div class="cont">
        <h3>Your Transaction</h3>
        <table border="1" cellpadding="10" cellspacing="0" class="tb1">
            <tr>
                <th>Code</th>
                <th>Transactions</th>
                <th>mutation</th>
                <th>amount</th>
                <th>date</th>
                <th>description</th>
            </tr>
            <?php while($row = mysqli_fetch_assoc($qtb)):?>
            <tbody>
                <tr>
                    <td><?=$row["code"];?></td>
                    <td><?=$row["transactions_name"];?></td>
                    <td><?=$row["mutation"];?></td>
                    <td><?=$row["amount"];?></td>
                    <td><?=$row["date"];?></td>
                    <td><?=$row["description"];?></td>
                </tr>
            </tbody>
            <?php endwhile; ?>
        </table>
    </div>
    
</body>

</html>