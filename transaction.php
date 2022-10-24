<?php
include 'head_menu.php';
$qtb = mysqli_query($koneksi, "SELECT code,transactions_name,mutation,amount,date,description FROM transactions");
?>


<div class="cont">
    <h3>Your Transaction</h3>
    <table border="1" cellpadding="10" cellspacing="0" class="tb1">
        <tr>
            <th>Code</th>
            <th>Transactions</th>
            <th>mutation</th>
            <th>amount</th>
            <th>description</th>
            <th>date</th>
        </tr>
        <?php while($row = mysqli_fetch_assoc($qtb)):?>
        <tbody>
            <tr>
                <td><?=$row["code"];?></td>
                <td><?=$row["transactions_name"];?></td>
                <td><?=$row["mutation"];?></td>
                <td><?=$row["amount"];?></td>
                <td><?=$row["description"];?></td>
                <td><?=$row["date"];?></td>
            </tr>
        </tbody>
        <?php endwhile; ?>
    </table>
</div>
<?php include 'end_menu.php'; ?>