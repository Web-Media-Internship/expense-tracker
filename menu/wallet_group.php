<?php include '../menu_control/php_menu.php';
$qtb = mysqli_query($koneksi, "SELECT * FROM wallet_groups WHERE users_id = '$idu'");
?>
<?php include '../menu_control/head_menu.php';?>
<?php include '../menu_control/first_body.php';?>

<div class="cont">
    <h3>wallet Group</h3>
    <table border="1" cellpadding="10" cellspacing="0" class="tb1">
        <tr>
            <th>Wallet Group</th>
            <th>status</th>
            <th>Action</th>
        </tr>
        <?php while($row = mysqli_fetch_assoc($qtb)):?>
        <tbody>
            <tr>
                <td><?=$row["name"];?></td>
                <td><?=$row["is_active"];?></td>
                <td>
                    <a href="wallet.php?id=<?=$row["id"];?>">OPEN</a> |
                    <a href="delw.php?id=<?=$row["id"];?>" onclick="
                        return confirm('want to delete this wallet group');">delete</a>
                </td>
            </tr>
        </tbody>
        <?php endwhile; ?>
    </table>
    <div>
        <a href="new_wg.php" name="add">make a new wallet</a>  
    </div>
</div>
<?php include '../menu_control/end_body.php'; ?>