<?php
include '../menu_control/php_menu.php';

$qtb = mysqli_query($koneksi, "SELECT * FROM transactions, wallets, mutation WHERE transactions.users_id = '$idu'
    AND transactions.mutation = mutation.mt_id AND transactions.wallets_id = wallets.wid");
?>
<?php include '../menu_control/head_menu.php'; ?>
<?php include '../menu_control/first_body.php'; ?>
        <h3>Your Transaction</h3>
        <table border="1" cellpadding="10" cellspacing="0" class="tb1">
            <tr>
                <th>Wallet</th>
                <th>Code</th>
                <th>Transactions</th>
                <th>mutation</th>
                <th>amount</th>
                <th>description</th>
                <th>date</th>
                <th>action</th>
            </tr>
            <?php while($row = mysqli_fetch_assoc($qtb)):?>
            <tbody>
                <tr>
                    <td><?=$row["wl_name"];?></td>
                    <td><?=$row["code"];?></td>
                    <td><?=$row["name"];?></td>
                    <td><?=$row["mt_name"];?></td>
                    <td><?=$row["amount"];?></td>
                    <td><?=$row["description"];?></td>
                    <td><?=$row["date"];?></td>
                    <td>
                        <a href="edit.php?id=<?=$row["id"];?>">edit</a> |
                        <a href="del.php?id=<?=$row["id"];?>" onclick="
                            return confirm('want to delete this transaction');">delete</a>
                    </td>
                </tr>
            </tbody>
            <?php endwhile; ?>
        </table>
        <div>
            <a href="new_tr.php" name="add">make a new transaction</a>  
        </div>
    </div>
<?php include '../menu_control/end_body.php'; ?>