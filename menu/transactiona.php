<?php
include '../menu_control/php_menu.php';
$id = $_GET['id'];
$qtb = mysqli_query($koneksi, "SELECT * FROM transactions, wallets, mutation WHERE transactions.id = '$id'
    AND transactions.mutation = mutation.mt_id AND transactions.wallets_id = wallets.id");
?>
<?php include '../menu_control/head_menu.php'; ?>
<body>
    <nav>
        <div class="logo">
            <h1>WALLET</h1>
        </div>
        <ul>
            <li><a href="../menu/wallet_group.php">back</a></li>
        </ul>
    </nav>
    <div class="cont">
        <h3>Your Transaction</h3>
            <?php while($row = mysqli_fetch_assoc($qtb)):?>
                <ul>
                    <li><?=$row["code"];?></li>
                    <li><?=$row["name"];?></li>
                    <li><?=$row["mt_name"];?></li>
                    <li><?=$row["amount"];?></li>
                    <li><?=$row["description"];?></li>
                    <li><?=$row["date"];?></li>
                    <li>
                        <a href="edit.php?id=<?=$row["id"];?>">edit</a> |
                        <a href="del.php?id=<?=$row["id"];?>" onclick="
                            return confirm('want to delete this transaction');">delete</a>
                    </li>
                </ul>
            <?php endwhile; ?>
        </table>
    </div>
<?php include '../menu_control/end_body.php'; ?>