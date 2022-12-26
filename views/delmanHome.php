<?php
require('header.php');
require('../models/customerModel.php');
require('../models/orderModel.php');

$worker_id = $_GET['workerid'];
$username = $_GET['userName'];


// if (isset($_POST['next'])) {
//     $cus_name = $_POST['cus_name'];
//     $cus_mob = $_POST['cus_mob'];
//     // $usernamelength = strlen($username);
//     // $passwordlength = strlen($password);

//     if (strlen($cus_name) != null && strlen($cus_mob) != null) {
//         $cus_id = addCustomer($cus_name, $cus_mob);
//         $emp_id = '13568'; //dummy value
//         $order_id = addOrder($cus_id, $emp_id);
//         $query = array(
//             'cusID' => $cus_id,
//             'orderID' => $order_id,
//             'msg' => ''
//         );
//         $query = http_build_query($query);
//         header("location: add_items_to_order.php?$query");
//     }
// }

?>

<html>

<head>
    <title>Cook Home Page</title>
</head>

<body>

    <h2 align="center">You logged in as <u><?= $username ?></u> -delivery man</h2>
    <h3 align="right"><a href="../controllers/logout.php"> logout</a></h3>
    <br />

    <h3 align='center'>Orders to deliver</h3>
    <table border="1" align="center">
        <tr>
            <th>Order</th>
            <th>Customer name</th>
            <th>Amount</th>
            <th>Phone</th>

        </tr>
        <tr>
            <?php
            $products = orderToDeliver();
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
                    <!-- <td>
                        <button><a href="deleteItemFromOrder_waiter.php?
                        i_no=<?= $row['ITEM_NO'] ?>&orderID=<?= $o_id ?>&cusID=<?= $c_id ?>"> Delete </a></button>
                        <!-- |
                        <button><a href="editItem_admin.php?id=<?= $row['ITEM_NO'] ?>"> Edit </a></button> -->
                    <!-- </td>  -->
        </tr>
<?php }
            } else
                echo "No Items found"; ?>

</tr>
    </table>

</body>

</html>