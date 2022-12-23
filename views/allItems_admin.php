<?php
require('header.php');
require('../models/itemModel.php');
$msg = "";
if (isset($_GET['msg'])) {
    if ($_GET['msg'] == 'itemAdded') {
        $msg = "Item added successfully !";
    } else if ($_GET['msg'] == 'editSucc') {
        $msg = "Item edit successfull !";
    } else {
        $msg = "Item deleted !";
    }
}


if (isset($_POST['add'])) {
    $item_no = $_POST['item_no'];
    $item_des = $_POST['item_des'];
    $item_price = $_POST['item_price'];
    $no_length = strlen($item_no);
    $des_length = strlen($item_des);
    $price_length = strlen($item_price);

    if ($no_length != null && $des_length != null && $price_length != null) { //add items
        $msg = addItem($item_no, $item_des, $item_price);
    } else
        $msg = "Input required fields !";
}
?>


<html>

<head>
    <title>Item List</title>
</head>

<body>
    <h3 align="right"><a href="../controllers/logout.php"> logout</a></h3>
    <form method="POST" action="#">
        <table>
            <h4>Add item:</h4>
            <tr>
                <td>Item no-</td>
                <td>
                    <input type="number" name="item_no" value="">
                </td>
            </tr>
            <tr>
                <td>Description-</td>
                <td>
                    <input type="text" name="item_des" value="" style="height: 65px;" size="30">
                </td>
            </tr>
            <tr>
                <td>Price-</td>
                <td>
                    <input type="text" name="item_price" value="">
                </td>
            </tr>

            <tr>
                <td></td>
                <td>
                    <input type="submit" name="add" value="Add">
                </td>
            </tr>
        </table>

    </form>
    <center> <?= $msg ?> </center>

    <h3 align='center'> All items</h3>
    <!-- <a href="adminHome.php"> Back</a> -->
    <table border="1" align="center">
        <tr>
            <th>Item No</th>
            <th>Description</th>
            <th>Price</th>
            <th>Action</th>

        </tr>
        <tr>
            <?php
            // $deleteError = "";
            $products = getAllItems();
            // if (isset($_GET['msg'])) {
            // 	$deleteError = "Delete operation failed !";
            // }
            // 
            ?>
        <tr>
            <?php
            if ($products != null) {
                while ($row = oci_fetch_assoc($products)) {
                    //print_r($row);
                    foreach ($row as $i => $val) {

                        //echo $row['id'];
            ?>
                        <td><?= $val ?></td>
                    <?php } ?>
                    <td>
                        <button><a href="deleteItem_admin.php?id=<?= $row['ITEM_NO'] ?>"> Delete </a></button>
                        |
                        <button><a href="editItem_admin.php?id=<?= $row['ITEM_NO'] ?>"> Edit </a></button>
                    </td>
        </tr>
<?php }
            } else
                echo "No Items found"; ?>
<!-- <?= $deleteError ?> -->

</tr>
    </table>
</body>

</html>