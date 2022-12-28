<?php
require('header.php');
require('../models/customerModel.php');
require('../models/orderModel.php');

$msg= '';
//$msg= $_GET['msg'] ?  $_GET['msg'] :'';
if (isset($_GET['msg'])) {
    if ($_GET['msg'] == 'orderCancel') {
        $msg = "Order has been canceled !";
    } 
}

?>

<html>

<head>
    <title>Pending order list</title>
</head>

<body>

<h3 align="left"><a href="waiterHome.php">Goto Waiter Home</a></h3>

    <!-- <h2 align="center">You logged in as <u><?= $username ?></u> -delivery man</h2> -->
    <h3 align="right"><a href="../controllers/logout.php"> logout</a></h3>
    <br />

    <h3 align='center'>Pending orders</h3>
    <table border="1" align="center">
        <tr>
            <th>Order</th>
            <th>Amount</th>
            <th>Status</th>
        </tr>
        <tr>
            <?php
            $products = pendingOrder();
            ?>
        <tr>
            <?php
            $or = '';
            // if ($products != null) {
            if ($products != null) {
                while ($row = oci_fetch_assoc($products)) {

                    foreach ($row as $i => $val) {
                    ?>
                        <td><?= $val ?></td>
                    <?php } ?>
                    <td>
                        <!-- <button><a href="deleteItemFromOrder_waiter.php?
                        i_no=<?= $row['ITEM_NO'] ?>&orderID=<?= $o_id ?>&cusID=<?= $c_id ?>"> Delete </a></button>
                        | -->
                        <button><a href="cancelOrder.php?orderID=<?= $row['ORDER_ID'] ?>">  Cancel</a></button>
                    </td> 
        </tr>
<?php }
            } else
                echo "No Items found"; ?>

</tr>
    </table>
    <?= $msg?>

</body>

</html>