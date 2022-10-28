<?php include '../menu_control/php_menu.php';
$iwg = $_GET['id'];
$qtb = mysqli_query($koneksi, "SELECT * FROM wallets WHERE wallet_groups_id = '$iwg'");
?>
<?php include '../menu_control/head_menu.php';?>
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
        <h3>wallet Group</h3>
        <table border="1" cellpadding="10" cellspacing="0" class="tb1">
            <tr>
                <th>Wallet</th>
                <th>description</th>
                <th>status</th>
                <th>Action</th>
            </tr>
            <?php while($row = mysqli_fetch_assoc($qtb)):?>
            <tbody>
                <tr>
                    <td><?=$row["name"];?></td>
                    <td><?=$row["description"];?></td>
                    <td><?=$row["is_active"];?></td>
                    <td>
                        <a href="wallet_group/?id=<?=$row["id"];?>">OPEN</a> |
                        <a href="wallet_group/?id=<?=$row["id"];?>" onclick="
                        return confirm('want to delete this transaction');">delete</a>
                    </td>
                </tr>
            </tbody>
            <?php endwhile; ?>
        </table>
        <div>
            <a href="new_wl.php?id=<?=$iwg?>" name="add">make a new wallet group</a>  
        </div>
    </div>
<?php include '../menu_control/end_body.php'; ?>