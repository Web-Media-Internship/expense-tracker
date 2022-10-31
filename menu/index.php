<?php
include '../menu_control/php_menu.php';

$qtb = mysqli_query($koneksi, "SELECT * FROM transactions, mutation WHERE transactions.users_id = '$idu'
    AND transactions.mutation = mutation.mt_id");
?>
<?php include '../menu_control/head_menu.php'; ?>
<?php include '../menu_control/first_body.php'; ?>

<div class="cont">
    <h3>Your Transaction</h3>
    <table border="1" cellpadding="10" cellspacing="0" class="tb1">
        <tr>
            <th>Code</th>
            <th>Transactions</th>
            <th>mutation</th> 
            <th>action</th>
        </tr>
        <?php while($row = mysqli_fetch_assoc($qtb)):?>
        <tbody>
            <tr>
                <td><?=$row["code"];?></td>
                <td><?=$row["name"];?></td>
                <td><?=$row["mt_name"];?></td>
                <td>
                    <a href="transactiona.php?id=<?=$row["id"];?>">OPEN</a>
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