<?php
require('header.php');

// $printUpdate="";
// $printUpdate=$_GET['msg'];

require('../models/itemModel.php');
$id = $_GET['id'];
$product = getItemByID($id);
$product = oci_fetch_assoc($product);
//print_r($product);
$prev_no= $product['ITEM_NO'];

if (isset($_REQUEST['edit'])) {
    $current_no = $_REQUEST['item_no'];
    $description = $_REQUEST['description'];
    $price = $_REQUEST['price'];

    if ($current_no && $description && $price) {
        $update = editItem($current_no,$description,$price, $prev_no);
        // if ($update) {
        //     header("location: productListAdmin.php");
        //     // $printUpdate="Update successfull...";
        //     // header("location: edit.php?id=$id&msg=$printUpdate");

        // } else {
        //     $printUpdate = "Operation Failed";
        // }
    }
}
?>

<html>

<head>
    <title>Edit Items</title>
</head>

<body>

    <!-- <a href="home.php"> Back</a> | -->
    <h3 align="right"><a href="../controllers/logout.php"> logout</a></h3>

    <form method="POST" action="#">
        <fieldset>
            <legend>Edit this item</legend>

            <table>
                <tr>
                    <td>Product ID</td>
                    <td>
                        <input type="number" name="item_no" value="<?= $product['ITEM_NO'] ?>">
                    </td>
                </tr>
                <tr>
                    <td>Seller ID</td>
                    <td>
                        <input type="text" name="description" value="<?= $product['DESCRIPTION'] ?>">
                    </td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td>
                        <input type="text" name="price" value="<?= $product['PRICE'] ?>">
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="edit" value="Save">
                    </td>
                </tr>
            </table>
        </fieldset>
    </form>
</body>

</html>