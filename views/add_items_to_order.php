<?php
require('header.php');
require('../models/customerModel.php');
require('../models/orderModel.php');

$c_id = $_GET['cusID'];
$o_id = $_GET['orderID'];
$msg = $_GET['msg'];
$orderTotal = 0;


if (isset($_POST['add'])) {
    $item_no = $_POST['item'];
    $quantity = $_POST['quantity'];
    // $usernamelength = strlen($username);
    // $passwordlength = strlen($password);

    if (strlen($item_no) != null && strlen($quantity) != null) {
        $stat = add_items_to_order($o_id, $item_no, $quantity);
        $query = array(
            'cusID' => $c_id,
            'orderID' => $o_id,
            'msg' => $stat
        );
        $query = http_build_query($query);
        header("location: add_items_to_order.php?$query");
    }
    else
    $msg ='Input required fields';
}

?>

<html>

<head>
    <title>Add items to order</title>
</head>

<body>
    <!-- <h2 align="center">You logged in as <u><?= $username ?></u> -waiter</h2> -->
    <h3 align="right"><a href="../controllers/logout.php"> logout</a></h3>
    <br />
    <!-- <button><a href="showAllitems_waiter.php">Show All Items </a> </button><br></br> -->
    <form method="POST" action="#">
        <fieldset>
            <legend>Add items to order</legend>

            <table>
                <h3>For order #<?= $o_id ?></h3>
                <tr>
                    <td>Item No</td>
                    <td>
                        <input type="number" name="item" value="">
                    </td>
                </tr>
                <tr>
                    <td>Quantity</td>
                    <td>
                        <input type="number" name="quantity" value="">
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="add" value="Add">
                    </td>
                </tr>
            </table>
        </fieldset>
        <?= $msg ?>
    </form>



    <h3 align='center'>Items to order</h3>
    <table border="1" align="center">
        <tr>
            <th>Item No</th>
            <th>Quantity</th>
            <th>Item total</th>


        </tr>
        <tr>
            <?php
            $products = getCart($o_id);
            ?>
        <tr>
            <?php
            // if ($products != null) {
            if ($products != null) {
                while ($row = oci_fetch_assoc($products)) {
                    $orderTotal += $row['ITEMTOTAL'];
                    foreach (array_slice($row,1) as $i => $val) {

            ?>
                        <td><?= $val ?></td>
                    <?php } ?>
                  <td>
                        <button><a href="deleteItemFromOrder_waiter.php?
                        i_no=<?= $row['ITEM_NO'] ?>&orderID=<?=$o_id?>&cusID=<?=$c_id?>"> Delete </a></button>
                        <!-- |
                        <button><a href="editItem_admin.php?id=<?= $row['ITEM_NO'] ?>"> Edit </a></button> -->
                    </td>
        </tr>
<?php }
            } else
                echo "No Items found"; ?>

</tr>
</table>

<h4 align='center'>Order total amount = <?= $orderTotal ?></h4>

<?php
if($orderTotal>0){ ?>
    <center><button><a href="placeOrder.php?orderID=<?=$o_id?>&amount=<?=$orderTotal?>"> Place order </a></button></center>
<?php } ?>


</body>

</html>