<?php
require('header.php');
require('../models/customerModel.php');
require('../models/orderModel.php');

$worker_id = $_GET['workerid'];
$username = $_GET['userName'];
$msg= '';
//$msg= $_GET['msg'] ?  $_GET['msg'] :'';
if (isset($_GET['msg'])) {
    if ($_GET['msg'] == 'orderPlaced') {
        $msg = "Order placed !";
    } 
}


if (isset($_POST['next'])) {
    $cus_name = $_POST['cus_name'];
    $cus_mob = $_POST['cus_mob'];
    // $usernamelength = strlen($username);
    // $passwordlength = strlen($password);

    if (strlen($cus_name)!=null && strlen($cus_mob)!= null ) {
        $cus_id= addCustomer($cus_name, $cus_mob);
        $emp_id= '13568'; //dummy value
        $order_id= addOrder($cus_id,$emp_id);
        $query = array(
            'cusID' => $cus_id,
            'orderID' => $order_id,
            'msg' => ''
        );
        $query = http_build_query($query);
        header("location: add_items_to_order.php?$query");
    }
}

?>

<html>

<head>
    <title>Waiter Home Page</title>
</head>

<body>
    <h2 align="center">You logged in as <u><?= $username ?></u> -waiter</h2>
    <h3 align="right"><a href="../controllers/logout.php"> logout</a></h3>
    <br />
    <button><a href="showAllitems_waiter.php">Show All Items </a> </button>  
    <button><a href="pendingOrderList.php">View Pending Orders </a> </button><br></br>
    <form method="POST" action="#">
        <fieldset>
            <legend>Take Order</legend>

            <table>
              <h3>Insert customer info first:</h3>
                    <tr>
                        <td>Customer name</td>
                        <td>
                            <input type="text" name="cus_name" value="">
                        </td>
                    </tr>
                    <tr>
                        <td>Customer mobile</td>
                        <td>
                            <input type="text" name="cus_mob" value="">
                        </td>
                    </tr>

               
                <!-- <tr>
                    <td>Branch</td>
                    <td>
                        <input type="text" name="branch" value="">
                    </td>

                </tr>
                <tr>
                    <td>Contact</td>
                    <td>
                        <input type="text" name="contact" value="">
                    </td>

                </tr>
                <tr>
                    <td>Email</td>
                    <td>
                        <input type="text" name="email" value="">
                    </td>

                </tr>
                <tr>
                    <td>Manager ID</td>
                    <td>
                        <input type="text" name="managerID" value="">
                    </td>

                </tr> -->
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="next" value="Next">
                    </td>
                </tr>
            </table>
        </fieldset>
    </form>

<?= $msg?>
</body>

</html>