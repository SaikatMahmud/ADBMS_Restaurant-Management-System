<?php
require('header.php');
require('../models/customerModel.php');
require('../models/orderModel.php');

$c_id = $_GET['cusID'];
$o_id = $_GET['orderID'];


if (isset($_POST['next'])) {
    $cus_name = $_POST['cus_name'];
    $cus_mob = $_POST['cus_mob'];
    // $usernamelength = strlen($username);
    // $passwordlength = strlen($password);

    if (strlen($cus_name)!=null && strlen($cus_mob)!= null ) {
        $cus_id= addCustomer($cus_name, $cus_mob);
        $emp_id= '13568'; //dummt value
        $order_id= addOrder($cus_id,$emp_id);
        echo $cus_id;
        echo $order_id;
        
        // $query = array(
        //     'username' => $username,
        //     'password' => $password,
        // );
        // $query = http_build_query($query);
        // header("location: ../controllers/loginCheck.php?$query");
    }
}

?>

<html>

<head>
    <title>Add items</title>
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
                        <input type="submit" name="add" value="Next">
                    </td>
                </tr>
            </table>
        </fieldset>
    </form>



    <h3 align='center'> All items</h3>
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
            if (oci_num_rows($products)!=1) {
                while ($row = oci_fetch_assoc($products)) {
                    foreach ($row as $i => $val) {

            ?>
                        <td><?= $val ?></td>
                    <?php } ?>
                    <!-- <td>
                        <button><a href="deleteItem_admin.php?id=<?= $row['ITEM_NO'] ?>"> Delete </a></button>
                        |
                        <button><a href="editItem_admin.php?id=<?= $row['ITEM_NO'] ?>"> Edit </a></button>
                    </td> -->
        </tr>
<?php }
            } else
                echo "No Items found"; ?>
<!-- <?= $deleteError ?> -->

</tr>
    </table>



</body>

</html>